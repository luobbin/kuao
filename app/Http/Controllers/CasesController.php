<?php

namespace App\Http\Controllers;

use App\Repositories\CasesCateRepositoryEloquent;
use App\Repositories\CasesRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;

use Prettus\Validator\Exceptions\ValidatorException;
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
    public function index(CasesCateRepositoryEloquent $cateRep,Request $request)
    {

        if (request()->wantsJson()) {
            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $cases = $this->repository->with(['cate'])->paginate($request->get("limit",10));
            foreach ($cases as $case){
                $case->url = url("case_detail",["id"=>$case->id]);
            }
            return response()->json($cases);
        }

        $cate_id = $request->get("cate_id",1);
        if ($request->has("search")){
            $fields = explode(";",$request->get("search"));
            $column = explode(":",$fields[0]);
            if (isset($column[1]))
                $cate_id = $column[1];
        }
        $commonData = $this->websetRep->getCommonData();
        return view('cases.index', [
            'common'=>$commonData,
            'cates' => $cateRep->all(),
            'cate_id' => $cate_id,
            //'data' => $cases,
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
    public function show($id, ProductRepositoryEloquent $repProduct)
    {
        $case = $this->repository->find($id);
//        $default_imgs = [
//            ['img'=>"/static/202108/8866cf1ae61db3c6d20a7e3d9e408fd8.jpg","title"=>"上海天文馆","info"=>"星际穿越，挥舞双臂，自有属于你的星河"],
//            ['img'=>"/static/202108/83fe45345227940e6f7b6d8220f53df6.jpg","title"=>"上海天文馆","info"=>"灯光利用黑空创造的间离效果容纳了人们的想象力，虚化了空间的边界，以期在方寸之间营造空幻浩渺的宇宙氛围。低照度的环境有利于打造沉浸式体验，同时以色温、亮度作为引导，呼应参观动线，呈现丰富立体的空间层次。"],
//            ['img'=>"/static/202108/c5abdeb04991aa8049ffe9d219c470be.jpg","title"=>"上海天文馆","info"=>"从家园启程踏入璀璨星空，围绕“日月地”展开银河系，逐渐打开浩瀚宇宙，了解人类对宇宙探索的历程和取得的成就。展陈设计将人文与科学进行了有机融合，把深奥的天文理论转化为艺术形态，以一种寓教于乐的方式打开天体和宇宙的奥秘，将神秘的宇宙星空带到身边。"],
//            ['img'=>"/static/202108/9ea56a32d559f75fb7f8e7beef945583.jpg","title"=>"上海天文馆","info"=>"征程-经历了漫长岁月的积累，人类对宇宙的探索不断加深，从卷卷书页到天文望远镜，灯光对不同展品采用了不同的照明方式，通过立体布灯的方法来表现三维展品的完整面貌,大型展品和布景以切合主题的灯光场景来表达内涵。"]
//        ];

        $case->imgs = empty($case->imgs)?[]:json_prase($case->imgs);
        if (!empty($case->product_ids)){
            $case->products = $repProduct->findByIds($case->product_ids);
        }
        if (request()->wantsJson()) {
            return response()->json($case);
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
            $param = $request->all();
            $param['imgs'] = json_encode($request->imgs);
            $data = $this->repository->create($param);

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
        $case = $this->repository->find($id);

        return view('cases.edit', compact('case'));
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
            $param = $request->all();
            $param['imgs'] = json_encode($request->imgs);
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
