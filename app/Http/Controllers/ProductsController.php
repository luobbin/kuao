<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
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
    public function __construct(ProductRepositoryEloquent $repository,WebSettingRepositoryEloquent $webSettingRepositoryEloquent)
    {
        $this->repository = $repository;
        $this->websetRep = $webSettingRepositoryEloquent;
    }

    /**
     * 产品首页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $products = $this->repository->with(['cate'])->paginate();

        if (request()->wantsJson()) {
            //返回json数据
            return response()->json($products);
        }
        $commonData = $this->websetRep->getCommonData();
        $hots = [
            ['name'=>'ADRAY SQ SINGLE','index_img'=>'/static/home/001180.jpg','url'=>url("product_detail",["id"=>1]),'cate_id'=>1],
            ['name'=>'ADRAY SQ SINGLE','index_img'=>'/static/home/001180.jpg','url'=>url("product_detail",["id"=>1]),'cate_id'=>1],
            ['name'=>'ADRAY SQ SINGLE','index_img'=>'/static/home/001180.jpg','url'=>url("product_detail",["id"=>1]),'cate_id'=>1],
            ['name'=>'ADRAY SQ SINGLE','index_img'=>'/static/home/001180.jpg','url'=>url("product_detail",["id"=>1]),'cate_id'=>1],
        ];
        return view('products.index', [
            'common'=>$commonData,
            'data' => $products,
            'hot_products' => $hots,
            'keyword'=>\request()->get("name",""),
            'pageTitle'=> "产品列表"."-".$commonData['web_name']
        ]);
    }

    /**
     * 产品搜索页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function search()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $products = $this->repository->with(['cate'])->paginate();

        if (request()->wantsJson()) {
            //返回json数据
            return response()->json($products);
        }
        $commonData = $this->websetRep->getCommonData();
        return view('products.search', [
            'common'=>$commonData,
            'data' => $products,
            'keyword'=>\request()->get("name",""),
            'pageTitle'=> "产品搜索結果列表"."-".$commonData['web_name']
        ]);
    }

    /**
     * 获取产品中心所有产品及分类
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listFontItems()
    {
        //返回json数据
        return response()->json($this->repository->listFontItems());
    }

    /**
     * 产品详情
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = $this->repository->with(['cate'])->find($id);

        $product->imgs = empty($product->imgs)?[]:json_decode($product->imgs,true);
        $features = empty($product->features)?[]:json_decode($product->features,true);
        if (count($features)>0){
            foreach ($features as $k=>$v){
                $features[$k] = json_decode($v,true);
            }
        }
        $product->features = $features;
        if (request()->wantsJson()) {
            return response()->json($product);
        }

        $commonData = $this->websetRep->getCommonData();
        return view('products.detail', [
            'common'=>$commonData,
            'data' => $product,
            'pageTitle'=> $product->name."-".$commonData['web_name']
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
            $data['imgs'] = json_encode($request->imgs);
            $data['features'] = json_encode($request->features);
            $product = $this->repository->create($data);

            $response = [
                'message' => 'Product created.',
                'data'    => $product->toArray(),
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
        $product = $this->repository->find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int            $id
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $data['imgs'] = json_encode($request->imgs);
            $data['features'] = json_encode($request->features);
            $product = $this->repository->update($data, $id);

            $response = [
                'message' => 'Product updated.',
                'data'    => $product->toArray(),
            ];

            return success($response);
        } catch (ValidatorException $e) {
            return error(204,$e->getMessageBag());
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
                'message' => 'Product deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Product deleted.');
    }
}
