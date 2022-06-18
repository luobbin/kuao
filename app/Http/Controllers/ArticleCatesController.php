<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleCateRepositoryEloquent;
use Illuminate\Support\Facades\Request;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class ArticleCatesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ArticleCatesController extends Controller
{
    /**
     * @var ArticleCateRepositoryEloquent
     */
    protected $repository;


    /**
     * ArticleCatesController constructor.
     *
     * @param ArticleCateRepositoryEloquent $repository
     */
    public function __construct(ArticleCateRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $articleCates = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $articleCates,
            ]);
        }

        return view('articleCates.index', compact('articleCates'));
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $articleCate = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $articleCate,
            ]);
        }

        return view('articleCates.show', compact('articleCate'));
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
        $articleCate = $this->repository->find($id);

        return view('articleCates.edit', compact('articleCate'));
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
