<?php

namespace App\Http\Controllers;

use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;

use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class CasesController.
 *
 * @package namespace App\Http\Controllers;
 */
class WebSettingController extends Controller
{
    /**
     * @var WebSettingRepositoryEloquent
     */
    protected $repository;


    /**
     * CasesController constructor.
     *
     * @param WebSettingRepositoryEloquent $repository
     */
    public function __construct(WebSettingRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 专题列表和配置列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $websets = $this->repository->all();

        if (strpos(\request()->get("search"),"common")!==false) {
            $datas = [];
            foreach ($websets as $webset) {
                if ($webset->type == 5) {
                    $webset->content = empty($webset->content)?[]:json_decode($webset->content, true);
                }
                $datas[$webset->name_attr] = is_null($webset->content)?[]:$webset->content;
            }
            $websets = $datas;
        }
        return response()->json([
            "data"=>$websets,
            "total"=>count($websets)
            ]);
    }

    /**
     * 后台获取单个配置详情
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $webset = $this->repository->find($id);
        if (in_array($webset->type, [2,5]) ) {
            $webset->content = json_decode($webset->content,true);
        }
        return response()->json($webset);
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
        if (empty($request->name)){
            error(203,"参数错误");
        }
        try {
            $param = $request->all();
            //多个处理
            if ($request->has("logo")){
                foreach ($param as $k=>$v) {
                    $webset = $this->repository->findByNameAttr($k);
                    if (!$webset)   continue;
                    $condition = ['content'=>$v];
                    if ($webset->type == 5) {
                        $condition['content'] = json_encode($condition['content']);
                        //$condition['content'] = json_encode(["http://robin.la/static/home/catalog6.png","http://robin.la/static/home/catalog5.png"]);
                    }
                    $data = $this->repository->update($condition, $webset->id);
                }
            }else {
                $data = $this->repository->create($param);
            }
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
        $item = $this->repository->find($id);

        return $item;
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
        if (empty($request->name)){
            error(203,"参数错误");
        }
        try {
            $param = $request->all();
            $res = $this->repository->update($param, $id);

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
