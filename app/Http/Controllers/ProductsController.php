<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use App\Entities\ProductCate;
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
        $cid = \request()->get("cid","");//大类目
        $cname = "";
        if (!empty($cid)){
            $cname = ProductCate::with([])->where("id",$cid)->value("name");
            if (in_array($cid,[2,4])){
                $products = ProductCate::with([])->whereRaw("pid = '{$cid}'")->orderByDesc("sort")->get();
            }else{
                $products = ProductCate::with([])->whereRaw("pid IN(SELECT id FROM `product_cates` WHERE pid = '{$cid}')")->orderByDesc("sort")->get();
            }
            foreach ($products as $p){
                $p->catelvlid = in_array($cid,[2,4]) ? "_0_{$cid}_1_{$p->id}" : "_0_{$cid}_1_{$p->pid}_2_{$p->id}";
            }
            //print_r($products);exit();
            $cid = sprintf("%04d",$cid);
        }
        $hots = $this->repository->getHots();
        return view('products.index', [
            'common'=>$commonData,
            'data' => $products,
            'hot_products' => $hots,
            'cid'=>$cid,
            'cname'=>$cname,
            'pageTitle'=> "产品列表"."-".$commonData['web_name']
        ]);
    }

    /**
     * 产品搜索页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $name = $request->get("name","");
        $products = empty($name)?[]:$this->repository->searchByName($name,$request->get("page",1));

        if (request()->wantsJson()) {
            //返回json数据
            return response()->json($products);
        }
        $commonData = $this->websetRep->getCommonData();
        return view('products.search', [
            'common'=>$commonData,
            'data' => empty($name)?$this->repository->getHots():$products,
            'name'=>\request()->get("name",""),
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
        //print_r($product);
        $product->imgs = str_empty($product->imgs)?[]:json_decode($product->imgs,true);
        //
        $product->features = str_empty($product->features)?[]:json_prase($product->features);

//        $docs = [
//            ['name'=>"技术规格","link"=>"/static/images/001.zip"],
//            ['name'=>"产品线图","link"=>"/static/images/001.zip"],
//            ['name'=>"配光曲线","link"=>"/static/images/001.zip"],
//            ['name'=>"安装说明","link"=>"/static/images/001.zip"]
//        ];
        $docs = [];
        $product->docs = str_empty($product->docs)?$docs:json_prase($product->docs);
        //print_r($product);exit;
        //dd($product);
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
            $data['features'] = json_to_string($request->features);
            $data['docs'] = json_to_string($request->docs);
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
            if ($request->has("imgs"))
                $data['imgs'] = json_encode($request->imgs);
            if ($request->has("docs"))
                $data['docs'] = json_to_string($request->docs);
            if ($request->has("features"))
                $data['features'] = json_to_string($request->features);
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
     * @param  string $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $id = trim($id,",");
        $idArr = explode(",",$id);
        try {
            $deleted = Product::with([])->whereIn("id", $idArr)->delete();
            if ($deleted) {
                return success("删除成功");
            }else{
                return error(203,"删除失败,请稍后重试");
            }
        }catch (\Exception $e){
            return error(203,"删除失败:{$e->getMessage()}");
        }
    }
}
