<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WebSettingRepository;
use App\Entities\WebSetting;
use App\Validators\WebSettingValidator;

/**
 * Class WebSettingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WebSettingRepositoryEloquent extends BaseRepository implements WebSettingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WebSetting::class;
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'location'
    ];

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return array
     */
    public function getCommonData()
    {
        $data = WebSetting::with([])->where("location","common")->get();
        $commonData = [];
        foreach ($data as $k=>$v){
            if ($v->type==2){
                //json格式要解析出来
                $content = $v->content;
                if ($v->name_attr=="web_header_menu_setting"){
                    $content = json_encode([
                      ['name'=>'产品中心','url' => url("products"), 'childs'=>[
                          ['name'=>'室内专业类','url' => url("products",["cate_id"=>1])],
                          ['name'=>'室内设计类','url' => url("products",["cate_id"=>1])],
                          ['name'=>'博物馆照明','url' => url("products",["cate_id"=>1])],
                          ['name'=>'展示箱','url' => url("products",["cate_id"=>1])]
                        ]
                      ],
                      ['name'=>'项目案例','url' => url("cases"), 'childs'=>[
                          ['name'=>'博物馆&美术馆&科技馆','url' => url("cases",["cate_id"=>1])],
                          ['name'=>'星级酒店','url' => url("cases",["cate_id"=>1])],
                          ['name'=>'家装别墅','url' => url("cases",["cate_id"=>1])],
                          ['name'=>'商业空间','url' => url("cases",["cate_id"=>1])]
                        ]
                      ],
                      ['name'=>'关于我们','url' => url("news",["id"=>'about_us']), 'childs'=>[
                            ['name'=>'公司资讯','url' => url('articles')],
                            ['name'=>'工厂介绍','url' => url("news",["id"=>'factory_info'])],
                            ['name'=>'关于库奥','url' => url(url("news",["id"=>'about_us']))]
                        ]
                      ],
                      ['name'=>'联系我们','url' => '#', 'childs'=>[
                            ['name'=>'联系我们','url' => url(url("news",["id"=>'contact_us']))]
                        ]
                      ]
                    ]);
                }else if ($v->name_attr=="mob_header_menu_setting"){
                    $content = json_encode([
                        ['name'=>'产品中心','url' => '/products'],
                        ['name'=>'巴比伦博物馆照明','url' => '/product_cates'],
                        ['name'=>'项目案例','url' => '/cases'],
                        ['name'=>'新闻动态','url' => '/article_cates'],
                        ['name'=>'关于库奥','url' => '/article']
                    ]);
                }else if ($v->name_attr=="right_account_list"){
                    $content = json_encode([
                        [
                            'name'=>'微信',
                            'ico1' => '/static/images/fr-ico1-1.png',
                            'ico2' => '/static/images/fr-ico1-2.png',
                            'img' => '/static/images/wx-ewm.jpg'
                        ],
                        [
                            'name'=>'微博',
                            'ico1' => '/static/images/fr-ico2-1.png',
                            'ico2' => '/static/images/fr-ico2-2.png',
                            'img' => '/static/images/wb-ewm.jpg'
                        ]
                    ]);
                }else if ($v->name_attr=="footer_menu_setting"){
                    $content = json_encode([
                        ['name'=>'产品中心','url' => '/product_cates', 'childs'=>[
                            ['name'=>'室内专业类','url' => '/product'],
                            ['name'=>'室内设计类','url' => '/product'],
                            ['name'=>'博物馆照明','url' => '/product'],
                            ['name'=>'展示箱','url' => '/product']
                        ]
                        ],
                        ['name'=>'项目案例','url' => '/cases', 'childs'=>[
                            ['name'=>'博物馆&美术馆&科技馆','url' => '/cases'],
                            ['name'=>'星级酒店','url' => '/case'],
                            ['name'=>'家装别墅','url' => '/case'],
                            ['name'=>'商业空间','url' => '/case']
                        ]
                        ],
                        ['name'=>'关于我们','url' => '/articles', 'childs'=>[
                            ['name'=>'公司资讯','url' => '/article'],
                            ['name'=>'工厂介绍','url' => '/article'],
                            ['name'=>'关于库奥','url' => '/article']
                        ]
                        ],
                        ['name'=>'联系我们','url' => '#', 'childs'=>[
                            ['name'=>'联系我们','url' => '/article']
                        ]
                        ]
                    ]);
                }
                $commonData[$v->name_attr] = json_decode($content,true);
            }else{
                $commonData[$v->name_attr] = $v->content;
            }
        }
        //dd($commonData);
        return $commonData;
    }

    public function findByNameAttr(string $attr)
    {
        return WebSetting::with([])->where("name_attr",$attr)->first();
    }


}
