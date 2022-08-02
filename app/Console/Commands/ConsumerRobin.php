<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2019/4/24
 * Time: 18:05
 */

namespace App\Console\Commands;
use App\Entities\WebSetting;
use Illuminate\Console\Command;

class ConsumerRobin extends Command
{
    /**
     * 处理消费数据
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'robin:test {act=clear} {--uid=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '测试数据-robin使用';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $act = $this->argument('act');
        if($act=='time'){//生产数据
            $this->info("app_path:".app_path());
            $this->info("base_path:".base_path());
            $this->info("public_path:".public_path());
            $this->info("realpath:".realpath());
            echo microtime();
        }elseif ($act=='top_cate'){//测试顶部菜单
            $list = [
                ['name'=>'产品中心','url' => '/news/product_center',
                    'childs'=>[
                        ['name'=>'室内专业类','url' => '/products?cid=1'],
                        ['name'=>'室内设计类','url' => '/products?cid=2'],
                        ['name'=>'博物馆照明','url' => '/products?cid=3'],
                        ['name'=>'展示箱','url' => '/products?cid=4']
                    ]
                ],
                ['name'=>'项目案例','url' => '/cases',
                    'childs'=>[
                        ['name'=>'博物馆&美术馆&科技馆','url' => '/cases?cate_id=1'],
                        ['name'=>'星级酒店','url' => '/cases?cate_id=2'],
                        ['name'=>'家装别墅','url' => '/cases?cate_id=3'],
                        ['name'=>'商业空间','url' => '/cases?cate_id=4']
                    ]
                ],
                ['name'=>'公司资讯','url' => '/articles',
                    'childs'=>[
                        ['name'=>'公司资讯','url' => '/articles']
                    ]
                ],
                ['name'=>'关于我们','url' => '/news/about_us',
                    'childs'=>[
                        ['name'=>'工厂介绍','url' => '/news/factory_info'],
                        ['name'=>'关于库奥','url' => '/news/about_us']
                    ]
                ],
                ['name'=>'加入我们','url' => '/news/contact_us',
                    'childs'=>[
                        ['name'=>'联系我们','url' => '/news/contact_us']
                    ]
                ]
            ];
            print_r($list);
            WebSetting::with([])->where("name_attr",'web_header_menu_setting')->update(["content"=>json_encode($list)]);
            echo json_encode($list);

        }elseif ($act=='test'){//测试
            $start = microtime();
            $waster = get_microtime_between($start,microtime());
            $this->info("共耗时{$waster}秒！");
            exit;

        }else{
            $this->info("没有数据");
        }
    }

    private function log($msg = '')
    {
        if (!$msg) {
            return $this;
        }
        if (php_sapi_name() == 'cli') {
            echo $msg, PHP_EOL;
        }
        return $this;
    }
}
