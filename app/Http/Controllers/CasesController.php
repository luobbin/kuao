<?php

namespace App\Http\Controllers;

use App\Repositories\CasesRepositoryEloquent;
use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CasesCreateRequest;
use App\Http\Requests\CasesUpdateRequest;
use App\Repositories\CasesRepository;

/**
 * Class CasesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CasesController extends Controller
{
    /**
     * @var CasesRepository
     */
    protected $repository;

    protected $websetRep;


    /**
     * CasesController constructor.
     *
     * @param CasesRepository $repository
     */
    public function __construct(CasesRepositoryEloquent $repository,WebSettingRepositoryEloquent $webSettingRepositoryEloquent)
    {
        $this->repository = $repository;
        $this->websetRep = $webSettingRepositoryEloquent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $cases = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $cases,
            ]);
        }

        $commonData = $this->websetRep->getCommonData();
        return view('cases.index', [
            'common'=>$commonData,
            'data' => $cases,
            'pageTitle'=> "案例列表"."-".$commonData['web_name']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $case = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $case,
            ]);
        }
        $commonData = $this->websetRep->getCommonData();
        return view('cases.detail', [
            'common'=>$commonData,
            'data' => $case,
            'pageTitle'=> $case->name."-".$commonData['web_name']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        if (empty($request->cate_id)||empty($request->name)){
            error(203,"参数错误");
        }
        try {

            $data = $this->repository->create($request->all());

            $response = [
                'message' => 'created.',
                'data'    => $data->toArray(),
            ];

            return success($response);
        } catch (ValidatorException $e) {
            return error(204,$e->getMessageBag());
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $case = $this->repository->find($id);

        return view('cases.edit', compact('case'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  string            $id
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        if (empty($request->cate_id)||empty($request->name)){
            error(203,"参数错误");
        }
        try {
            $res = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'updated.',
                'data'    => $res->toArray(),
            ];

            return success($response);
        } catch (ValidatorException $e) {
            return error(204,$e->getMessageBag());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  string $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $idArr = explode(",",$id);
        $deleted = $this->repository->deleteWhere(["in"=>["id"=>$idArr]]);

        if ($deleted) {
            return success("删除成功");
        }

        return error(203,"删除失败");
    }
}
