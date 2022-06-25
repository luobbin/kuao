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