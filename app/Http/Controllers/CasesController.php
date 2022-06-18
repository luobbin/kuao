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
     * @param  CasesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CasesCreateRequest $request)
    {
        try {

            $case = $this->repository->create($request->all());

            $response = [
                'message' => 'Cases created.',
                'data'    => $case->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
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
     * @param  CasesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CasesUpdateRequest $request, $id)
    {
        try {

            $case = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Cases updated.',
                'data'    => $case->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Cases deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cases deleted.');
    }
}
