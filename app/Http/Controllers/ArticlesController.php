<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleCateRepositoryEloquent;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;

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
            $articles = $this->repository->paginate();
            return response()->json([
                'data' => $articles,
            ]);
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
            return response()->json([
                'data' => $article,
            ]);
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
            return response()->json([
                'data' => $article,
            ]);
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
     * @param  ArticleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ArticleCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $article = $this->repository->create($request->all());

            $response = [
                'message' => 'Article created.',
                'data'    => $article->toArray(),
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
        $article = $this->repository->find($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $article = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Article updated.',
                'data'    => $article->toArray(),
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
                'message' => 'Article deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Article deleted.');
    }
}
