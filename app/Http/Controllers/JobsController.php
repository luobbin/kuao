<?php

namespace App\Http\Controllers;

use App\Repositories\JobRepositoryEloquent;
use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;

use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class JobsController.
 *
 * @package namespace App\Http\Controllers;
 */
class JobsController extends Controller
{
    /**
     * @var JobRepositoryEloquent
     */
    protected $repository;

    protected $websetRep;

    /**
     * JobsController constructor.
     *
     * @param JobRepositoryEloquent $repository
     */
    public function __construct(JobRepositoryEloquent $repository, WebSettingRepositoryEloquent $webSettingRepositoryEloquent)
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
        $jobs = $this->repository->all();

        if (request()->wantsJson()) {
            //返回json数据
            return response()->json($jobs);
        }

       // print_r($jobs);exit;
        $commonData = $this->websetRep->getCommonData();

        return view('jobs.index', [
            'common'=>$commonData,
            'data' => $jobs,
            'pageTitle'=> "公司招聘"."-".$commonData['web_name']
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
        try {
            $data = $request->all();
            $job = $this->repository->create($data);

            $response = [
                'message' => 'created.',
                'data'    => $job->toArray(),
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $job = $this->repository->find($id);
        $commonData = $this->websetRep->getCommonData();

        if (request()->wantsJson()) {
            return response()->json($job);
        }

        return view('jobs.detail', [
            'common'=>$commonData,
            'data' => $job,
            'pageTitle'=> $job->title."-".$commonData['web_name']
        ]);
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
        $job = $this->repository->find($id);

        return view('jobs.edit', compact('job'));
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
        try {
            $data = $request->all();
            $job = $this->repository->update($data, $id);

            $response = [
                'message' => 'updated.',
                'data'    => $job->toArray(),
            ];

            return success($response);
        } catch (ValidatorException $e) {
            return error(204,$e->getMessageBag());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
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
