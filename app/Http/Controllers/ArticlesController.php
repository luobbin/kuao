<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleCateRepositoryEloquent;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;


use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class ArticlesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ArticlesController extends Controller
{
    /**
     * @var ArticleRepositoryEloquent
     */
    protected $repository;
    protected $websetRep;

    /**
     * ArticlesController constructor.
     *
     * @param ArticleRepositoryEloquent $repository
     */
    public function __construct(ArticleRepositoryEloquent $repository,WebSettingRepositoryEloquent $webSettingRepositoryEloquent)
    {
        $this->repository = $repository;
        $this->websetRep = $webSettingRepositoryEloquent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(ArticleCateRepositoryEloquent $cateRep, Request $request)
    {
        if (request()->wantsJson()) {
            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $articles = $this->repository->with(['cate'])->paginate();
            return response()->json($articles);
        }
        $where = $request->all();
        if (!isset($where['cate_id'])){
            $where['cate_id'] = 1;
        }

        $articles = $this->repository->with([])->findWhere($where)->forPage($request->get("page",1),$request->get("pageSize",10));
        $commonData = $this->websetRep->getCommonData();
        return view('articles.index', [
            'common'=>$commonData,
            'cates' => $cateRep->all(),
            'data' => $articles,
            'pageTitle'=> "资讯列表"."-".$commonData['web_name']
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
        $article = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json($article);
        }
        $commonData = $this->websetRep->getCommonData();
        $article->next = $this->repository->nextItm($id);
        $article->previous = $this->repository->previousItm($id);
        return view('articles.detail', [
            'common'=>$commonData,
            'data' => $article,
            'pageTitle'=> $article->title."-".$commonData['web_name']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function news($id)
    {
        $article = $this->websetRep->findByNameAttr($id);

        if (request()->wantsJson()) {
            return response()->json($article);
        }
        $commonData = $this->websetRep->getCommonData();
        return view('articles.news', [
            'common'=>$commonData,
            'data' => $article,
            'pageTitle'=> $article->name."-".$commonData['web_name']
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
        //print_r($request->all());
        if (empty($request->cate_id)||empty($request->title)){
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
        $article = $this->repository->find($id);

        return view('articles.edit', compact('article'));
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
        if (empty($request->cate_id)||empty($request->title)){
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
