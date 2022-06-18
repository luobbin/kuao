<?php

namespace App\Http\Controllers;

use App\Repositories\ProductCateRepositoryEloquent;
use App\Repositories\ProductRepository;
use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductCatesController extends Controller
{

    /**
     * @var ProductRepository
     */
    protected $repository;

    protected $websetRep;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     */
    public function __construct(ProductCateRepositoryEloquent $repository,WebSettingRepositoryEloquent $webSettingRepositoryEloquent)
    {
        $this->repository = $repository;
        $this->websetRep = $webSettingRepositoryEloquent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $datas = $this->repository->allCates();
        //返回json数据
        return response()->json([
            'data' => $datas,
            'total' => count($datas),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        //返回json数据
        return response()->json($this->repository->allCates());
    }

    /**
     * 获取产品中心所有分类
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listFontCate()
    {
        //返回json数据
        return response()->json($this->repository->allFontCates());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //print_r($request->all());
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
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return success($this->repository->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
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
     * @param  string  $ids
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($ids)
    {
        $idArr = explode(",",$ids);
        $deleted = $this->repository->deleteWhere(["in"=>["id"=>$idArr]]);

        if ($deleted) {
            return success("删除成功");
        }

        return error(203,"删除失败");
    }
}
