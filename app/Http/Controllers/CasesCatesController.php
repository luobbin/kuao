<?php

namespace App\Http\Controllers;

use App\Repositories\CasesCateRepositoryEloquent;
use Illuminate\Http\Request;

use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\CasesCateRepository;

/**
 * Class CasesCatesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CasesCatesController extends Controller
{
    /**
     * @var CasesCateRepository
     */
    protected $repository;

    /**
     * CasesCatesController constructor.
     *
     * @param CasesCateRepository $repository
     */
    public function __construct(CasesCateRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $casesCates = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $casesCates,
            ]);
        }

        return view('casesCates.index', compact('casesCates'));
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $casesCate = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $casesCate,
            ]);
        }

        return view('casesCates.show', compact('casesCate'));
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
        $casesCate = $this->repository->find($id);

        return view('casesCates.edit', compact('casesCate'));
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
