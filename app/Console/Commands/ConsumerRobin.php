<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2019/4/24
 * Time: 18:05
 */

namespace App\Console\Commands;
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
        }elseif ($act=='foot_cate'){//测试底部菜单
            $content = '[{"name":"\u5173\u4E8E\u6211\u4EEC","url":"%23","childs":[{"name":"\u5173\u4E8E\u5E93\u5965","url":"\/news\/about_us"},{"name":"\u5DE5\u5382\u4ECB\u7ECD","url":"\/news\/factory_info"}]},{"name":"\u4EA7\u54C1\u4E2D\u5FC3","url":"\/products","childs":[{"name":"\u5BA4\u5185\u4E13\u4E1A\u7C7B","url":"\/products?cid=1"},{"name":"\u5BA4\u5185\u8BBE\u8BA1\u7C7B","url":"\/products?cid=2"},{"name":"\u535A\u7269\u9986\u7167\u660E","url":"\/products?cid=3"},{"name":"\u5C55\u793A\u7BB1","url":"\/products?cid=4"}]},{"name":"\u9879\u76EE\u6848\u4F8B","url":"\/cases","childs":[{"name":"\u535a\u7269\u9986&\u7f8e\u672f\u9986&\u79d1\u6280\u9986","url":"\/cases?cate_id=1"},{"name":"\u661F\u7EA7\u9152\u5E97","url":"\/cases?cate_id=2"},{"name":"\u5BB6\u88C5\u522B\u5885","url":"\/cases?cate_id=3"},{"name":"\u5546\u4E1A\u7A7A\u95F4","url":"\/cases?cate_id=4"}]},{"name":"\u5173\u4E8E\u6211\u4EEC","url":"%23","childs":[{"name":"\u516C\u53F8\u8D44\u8BAF","url":"\/articles"},{"name":"\u8054\u7CFB\u6211\u4EEC","url":"\/news\/contact_us"}]}]';
            $list = json_decode($content,true);
            print_r($list);
            $list[3]['name'] = "加入我们";
            print_r($list);
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
