<?php
/**
 * Created by 157908152@qq.com.
 * User: Robin
 * Date: 2018/9/8 0008
 * Time: 上午 10:09
 */

use Illuminate\Support\Facades\Log;

function test()
{
    return '公共函数测试';
}

/*
*检测敏感词
*$content 检测内容
*return: true 有异常 false无异常
*/
if (!function_exists('check_sensitive')) {
    function check_sensitive($content)
    {
        if (is_numeric($content)){
            return false;//数字不用检测
        }
        //只有非空字符串才检测
        if (is_string($content) and !empty($content)) {
            $redis = \Illuminate\Support\Facades\Redis::connection('res1');
            $word_sensitive = $redis->get("word_sensitive");
            if (empty($word_sensitive)) {
                $word_anti = \Illuminate\Support\Facades\DB::table("fanli_sensitive")->pluck("word")->toArray();
                $redis->set("word_sensitive", json_encode($word_anti));
            } else {
                $word_anti = json_decode($word_sensitive, true);
            }
            //遍历敏感词找异常
            foreach ($word_anti as $key) {
                if (strpos($content, $key) !== false) {
                    return true;
                }
            }
        }
        return false;
    }
}

/*
*替换敏感词
*$content 检测内容
*return: true 有异常 false无异常
*/
if (!function_exists('replace_sensitive')) {
    function replace_sensitive($content)
    {
        if (is_numeric($content)){
            return $content;//数字不用检测
        }
        //只有非空字符串才检测
        if (is_string($content) and !empty($content)) {
            $redis = \Illuminate\Support\Facades\Redis::connection('res1');
            $word_sensitive = $redis->get("word_sensitive");
            if (empty($word_sensitive)) {
                $word_anti = \Illuminate\Support\Facades\DB::table("fanli_sensitive")->pluck("word")->toArray();
                $redis->set("word_sensitive", json_encode($word_anti));
            } else {
                $word_anti = json_decode($word_sensitive, true);
            }
            //遍历敏感词找异常
            foreach ($word_anti as $key) {
                if (strpos($content, $key) !== false) {
                    return str_replace($key,"***",$content);
                }
            }
        }
        return $content;
    }
}

/*
*获取月份
*$dec 0：本月 1：下个月 -1：上个月 -2：上上个月
*return: Y_m,例如：2018_05
*/
if (!function_exists('get_month')) {
    function get_month($dec = 0,$mark = "_")
    {
        //得到系统的年月
        $tmp_date = date("Ym");
        //切割出年份
        $tmp_year = substr($tmp_date, 0, 4);
        //切割出月份
        $tmp_mon = substr($tmp_date, 4, 2);
        $tmp_month = mktime(0, 0, 0, $tmp_mon + $dec, 1, $tmp_year);
        return $fm_next_month = date("Y{$mark}m", $tmp_month);
    }
}



/*
* 获取指定月份的上月、下月等数据
* $month: 指定月份,例如：2018-08或者2018_08
* $dec 0：本月 1：下个月 -1：上个月 -2：上上个月
* return: Y_m,例如：2018_05
*/
if (!function_exists('get_appoint_month')) {
    function get_appoint_month($month, $dec = 0)
    {
        //得到系统的年月
        $tmp_date = str_replace(['-', '_'], '', $month);//date("Ym");
        //切割出年份
        $tmp_year = substr($tmp_date, 0, 4);
        //切割出月份
        $tmp_mon = substr($tmp_date, 4, 2);
        $tmp_month = mktime(0, 0, 0, $tmp_mon + $dec, 1, $tmp_year);
        return $fm_next_month = date("Y_m", $tmp_month);
    }
}

/*
* 获取两个日期之间的所有日期
* $start: 开始日期,例如：2018-08-01
* $end: 结束日期,例如：2018-08-31
* return: array,例如：[2018-08-01,2018-08-02,...]
*/
if (!function_exists('get_between_date')) {
    function get_between_date($start, $end)
    {
        $data = [];
        $dt_start = strtotime($start);
        $dt_end = strtotime($end);
        while ($dt_start <= $dt_end) {
            $data[] = date('Y-m-d', $dt_start);
            $dt_start = strtotime('+1 day', $dt_start);
        }
        return $data;
    }
}

/*
* 时间戳转时间说明
* $timestamp: 时间戳或者日期格式
* return: string,例如：1小时前
*/
if (!function_exists('get_time_info')) {
    function get_time_info($timestamp)
    {
        if(strpos($timestamp,'-') !== false){
            $timestamp = strtotime($timestamp);
        }
        $_time = time()-$timestamp;
        switch ($_time){
            case $_time<3600://小于1小时，以‘n分钟前’显示
                $time = ceil($_time/60).'分钟前';
                break;
            case 3600<=$_time && $_time<86400://大于一小时小于一天 以“N小时前”显示
                $time = ceil($_time/3600).'小时前';
                break;
            case 86400<=$_time && $_time<864000://大于一天小于10天 以‘N天前’显示
                $time = ceil($_time/86400).'天前';
                break;
            default:
                $time = date('Y-m-d',$timestamp);
                break;
        }
        return $time;
    }
}
/**
 * 模拟post进行url请求
 * @param string $url
 * @param string $param
 */
if (!function_exists('http_request')) {
    function http_request($url, $post = '',$header='', $timeout = 30)
    {
        if (empty($url)) {
            return false;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        if($header!=''){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        if ($post != '' && !empty($post)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
/**
 * 存储日志
 */
if(!function_exists('saveLog')){
    function saveLog($arr,$type,$dataid){
        #$model = \App\Mgdb::table('log_list');
//        $item = [
//            'data_id'=>$dataid,
//            "type"=>$type,
//            "content"=>json_encode($arr),
//            "level"=>1,
//            "log_time"=>time()
//        ];
//        \Illuminate\Support\Facades\Redis::connection('res4')->lPush("system_member_error_logs",json_encode($item));
        return ["status"=>0,"content"=>"日志生成成功"];
    }
}
/**
 * 打印sql
 */
if(!function_exists('getQuery')){
    function getQuery($builder){
        return sprintf(str_replace('?','%s',$builder->toSql));
    }
}
if (! function_exists('success')) {
    /*
     * @param $content
     * @return \Illuminate\Http\JsonResponse
     */
    function success($content,$ext = [])
    {
        $data = ['code'=>200,'data'=>$content,'ext'=>$ext];
        $json = response()->json($data);
        return $json;
    }
}
if (! function_exists('error')) {
    /**
     * @param $content
     * @return \Illuminate\Http\JsonResponse
     */
    function error($code,$msg='',$data=[])
    {
        $data = ['code'=>$code,'data'=>$data,'msg'=>$msg,'error'=>$msg,'message'=>$msg];
        $json = response()->json($data);
        return $json;
    }
}

/*
* UID加密
* $uid: 用户id
* return: string,加密后数据
*/
if (!function_exists('uid_encrypt')) {
    function uid_encrypt($uid)
    {
        $appkey = ['5#cUs$Hwf&0&slVwzj','zpbzZz!go2*x^rL^ZH5^hRSW5CtW'];//前后秘钥串
        $pattr = [0=>'#', 1=>'x', 2=>'G', 3=>'%', 4=>'q', 5=>'M', 6=>'!', 7=>'t', 8=>'5', 9=>'l'];//加密字典
        $uid = $uid + 178178;//数值增加
        $uid = str_pad($uid,10,"0",STR_PAD_LEFT);//生成10位数，不足前面补0
        $uid = strrev($uid);//将数字翻转
        $uids = str_split((string)$uid);//数值转数组
        $res = '';
        foreach ($uids as $v){
            $res .= $pattr[$v];//转换成字符串
        }
        $res = $appkey[0].$res.$appkey[1];//拼接前后的秘钥串
        return bin2hex($res);

    }
}

/*
* UID解密
* $token: 密文
* return: uid：用户id
*/
if (!function_exists('uid_decrypt')) {
    function uid_decrypt($token)
    {
        try{
            $appkey = ['5#cUs$Hwf&0&slVwzj','zpbzZz!go2*x^rL^ZH5^hRSW5CtW'];
            $pattr = ['#'=>0, 'x'=>1, 'G'=>2, '%'=>3, 'q'=>4, 'M'=>5, '!'=>6, 't'=>7, '5'=>8, 'l'=>9];
            $token=hex2bin($token);
            $token = str_replace($appkey,'',$token);
            $uids = str_split((string)$token);
            $res = '';
            foreach ($uids as $v){
                $res .= $pattr[$v];
            }
            $uid = strrev($res);
            $uid = preg_replace('/^0+/','',$uid);//str_pad($uid,10,"0",STR_PAD_LEFT);
            $uid = $uid - 178178;
        }catch (Exception $exception){
            return 0;
        }
        return $uid;
    }
}

/**
 * 获取用户邀请码
 */
if(!function_exists('getUidCode')){
    function getUidCode($uid){
        $redis = app('redis')->connection('res6');
        $_data = $redis->get('uid_dictionary');
        $data = json_decode($_data,1);
        $newStr= sprintf('%09s', $uid);
        $a = substr($newStr,0,3);
        $a1 = $data[$a];
        $b = substr($newStr,3,3);
        $b1 = $data[$b];
        $c = substr($newStr,6,3);
        $c1 = $data[$c];
        return $a1.$b1.$c1;
    }
}

/**
 * 统一发送日志数据接口 escloud-log
 * developer (调用此接口时，需发送开发者对应的编号（1,2,3...），告警时会发送给对应的开发者)  1.国森 9.冬梅 18.洪阳 12.罗兵 16.夏天 5.黄江
 * level  1.正常信息 2.警告信息(不发送邮件告警)  3.异常信息   4.警告信息(发送邮件告警)
 * title 日志标题 (必须包含level对应的关键字  level=1 信息  level=2,4 警告  level=3 异常)
 * exception 异常信息（level=3为必填）
 * requestParam 请求参数的json格式化信息，内容会放到format的“请求参数：{}”括号里面
 * return 返回结果 true成功 false 失败
 */
if(!function_exists('save_eslog')){
    function save_eslog($developer,$level,$title,$requestParam='',$exception='',$responseParam=''){
        return false;
//        if($level==3 && empty($exception))
//            return false;
//        if($level!=3 && !empty($exception))return false;
//        $_levelArr=[1=>'Info',2=>'Notice',4=>'Warning',3=>'Error'];
//        $_developer = [
//            0   =>	'zhangjunwei@hfhj178.com',
//            1	=>	'luobing@hfhj178.com',
//            5	=>	'huangjiang@hfhj178.com',
//            9	=>	'liaodongmei@hfhj178.com',
//            12	=>	'luobing@hfhj178.com',
//            16	=>	'zhangjunwei@hfhj178.com',
//            18	=>	'huangjiang@hfhj178.com',
//        ];
//        $res = false;//默认值
//        try{
//            /*$data = [
//                "module" =>  "task-aikbao",
//                "level"     =>  $level,
//                "format"   =>  $title." 请求参数：{} 返回参数：{}",
//                "requestParam"  => $requestParam,
//                "responseParam"  => $responseParam,
//                "developer"=>$developer,
//                "file"=>$exception?$exception->getFile():'',
//                "code"=>$exception?$exception->getCode():'',
//                "line"=>$exception?$exception->getLine():'',
//                "message"=>$exception?$exception->getMessage()."\n".$exception->getTraceAsString():'',
//            ];
//            $header = ["Content-Type: application/json"];
//            $res = http_request(env('KIBANA_LOG_SERVER'), json_encode($data),$header,3);*/
//
//            $msg = [
//                "platform"  =>  "akb-platform",
//                "level"     =>  $_levelArr[$level],
//                "title"          =>  $title,
//                "creatTime"          =>  date("Y-m-d H:i:s"),
//                "trace"          =>  $exception?$exception->getTraceAsString():null,
//                "message"          =>  $exception?$exception->getMessage():null,
//                "code"          => $exception?$exception->getCode():null,
//                "request"          =>  $requestParam,
//                "response"          =>  $responseParam,
//                "url"          =>  $_SERVER['HTTP_REFERER']??null,
//                "serverName"          =>  $_SERVER['SERVER_NAME']??null,
//                "hostIp"          =>  $_SERVER['SERVER_ADDR']??null,
//                "developerEmail"          =>   $_developer[$developer],
//                "notes"          =>  '',
//            ];
//            $_logArr=json_encode($msg);
//            $_logArr=json_decode($_logArr,true);
//            foreach ($_logArr as $key=>$value){
//                unset($_logArr[$key]);
//                if($value){
//                    $_keyArr=explode('\\',$key);
//                    $_logArr[$_keyArr[count($_keyArr)-1]]=$value;
//                }
//            }
//            \Illuminate\Support\Facades\Redis::connection("log")->lPush('log_list',json_encode($_logArr));
//        }catch (\Exception $e) {
//            saveLog(['log'=>$e->getMessage(),'title'=>$title],"存储日志失败",$developer.$level);
//        }
//        unset($_developer,$_levelArr,$_logArr,$msg,$level,$developer,$exception,$title,$requestParam,$responseParam);
//        return $res;
    }
}

/**
 * 根据邀请码获取uid
 */
if(!function_exists('parserCode')){
     function parserCode($code){
        $redis = app('redis')->connection('res6');
        $_data = $redis->get('uid_dictionary');
         if(!$_data) $_data = \App\Models\Webset::conf('uid_dictionary')->val;
        $data = json_decode($_data,1);
        $a = substr($code,0,2);
        $a1 = array_search($a,$data);
        $b = substr($code,2,2);
        $b1 = array_search($b,$data);
        $c = substr($code,4,2);
        $c1 = array_search($c,$data);
         if(!$a1 || !$b1 || !$c1) return 0;
         return (int)$a1.$b1.$c1;
    }
}
/*
* 将数组转url拼接地址
* $data: 数组
* return: url：地址串
*/
if (!function_exists('array_to_url')) {
    function array_to_url($data)
    {
        $res = '';
        foreach ($data as $k=>$v){
            $res .= "&{$k}={$v}";
        }
        return $res;
    }
}
/**
 * 用户统一信息更新
 */
if(!function_exists('UnityUpdate')){
    function UnityUpdate($uid){
        $info = ['sign'=>'ebNE@aBXD4a$8r$*','laiyuan'=>'akb'];
        $url = env('API_USER_SYNC_DOMAIN','http://member.xfz178.com').'/web/v1/sync_update/'.$uid;
        $header = array('ClientType:web');
        $result = http_request($url,$info,$header,3);
        return json_decode($result,1);
    }
}

if(!function_exists('versionCompare')){
    function versionCompare($versionA, $versionB)
    {
        if ($versionA > 2147483646 || $versionB > 2147483646) {
            throw new \Exception('版本号,位数太大暂不支持!', '101');
        }
        $dm = '.';
        $verListA = explode($dm, (string)$versionA);
        $verListB = explode($dm, (string)$versionB);

        $len = max(count($verListA), count($verListB));
        $i = -1;
        while ($i++ < $len) {
            $verListA[$i] = intval(@$verListA[$i]);
            if ($verListA[$i] < 0) {
                $verListA[$i] = 0;
            }
            $verListB[$i] = intval(@$verListB[$i]);
            if ($verListB[$i] < 0) {
                $verListB[$i] = 0;
            }

            if ($verListA[$i] > $verListB[$i]) {
                return 1;
            } else if ($verListA[$i] < $verListB[$i]) {
                return -1;//a<b
            } else if ($i == ($len - 1)) {
                return 0;//a=b
            }
        }

    }
}

/**
 * mongodb统一存储数据接口
 */
if(!function_exists('save_mongodb')){
    function save_mongodb($table,$content,$index_fields=''){
        /*$status = \App\Mgdb::table($table)->insert(json_decode($content,true));
        if($status)
            $res = ["status"=>0,"content"=>"数据提交成功"];
        else
            $res = ["status"=>3,"content"=>"数据提交失败"];*/
        //\Illuminate\Support\Facades\Redis::connection('res4')->lPush("system_member:{$table}",$content);
        return ["status"=>3,"content"=>"数据提交失败"];
    }
}

/**
 * 接口返回成功
 * $result array  获取的结果
 * $has_next 是否还有下一页  true 有  false 没有
 * $msg 返回的信息
 */
if (! function_exists('successData')) {
    function successData($result,$has_next=true,$msg='')
    {
        $meta = ['code'=>200,'msg'=>$msg,'has_next'=>$has_next];
        $data = ['meta'=>$meta,'results'=>$result];
        $json = response()->json($data);
        return $json;
    }
}

/**
 * 接口返回数据
 * $result array  获取的结果
 * $has_next 是否还有下一页  true 有  false 没有
 * $msg 返回的信息
 */
if (! function_exists('responseData')) {
    function responseData($result,$has_next=true,$code='200',$msg='')
    {
        $meta = ['code'=>$code,'msg'=>$msg,'has_next'=>$has_next];
        $data = ['meta'=>$meta,'results'=>$result];
        $json = response()->json($data);
        return $json;
    }
}

/*
 * kafka生产队列
 * $topic:订阅的主题
 * $data:订阅的内容
 * return $res 1:成功 0：失败
 */
if(!function_exists('kafka_produce')){
    function kafka_produce($topic, $data){
        try{
            $rk = new \RdKafka\Producer();
//            $rk->setLogLevel(LOG_DEBUG); // 设置日志级别
            $rk->addBrokers(env('KAFKA_BROKER_LIST','120.79.209.61')); // 添加经纪人，就是ip地址

            Log::debug(__METHOD__.' kafka address:'.env('KAFKA_BROKER_LIST','120.79.209.61').
                ' topic:'.$topic.' data:'.$data);

            $conf = new \RdKafka\TopicConf();
            $conf->set("message.timeout.ms", 1000);//设置超时时间1s
            $topic = $rk->newTopic($topic,$conf); // 新建主题

            // 第一个参数：是分区。RD_KAFKA_PARTITION_UA代表未分配，并让librdkafka选择分区
            // 第二个参数：是消息标志，必须为0
            // 第三个参数：消息，如果不为NULL，它将被传递给主题分区程序
            $php_start = microtime();
            $topic->produce(RD_KAFKA_PARTITION_UA, 0, $data); // 生成并发送单个消息
            while ($rk->getOutQLen() > 0) {
                $rk->poll(50);
            }
            $seconds = get_microtime_between($php_start, microtime());
            $res = $seconds > 1? 0 : 1;
            Log::debug(__METHOD__.' $res:'.$res.' $seconds:'.$seconds);
        }catch (\Exception $e) {
            Log::error(__METHOD__.' e:'.$e->getMessage());
            save_eslog(0,3,"Kafka队列异常",'{topic:'.$topic.'}',$e);
            $res = 0;
        }
        return $res;
    }
}

/*
 * kafka生产队列（重构）
 * $topic:订阅的主题
 * $data:订阅的内容
 * return $res 1:成功 0：失败
 */
if(!function_exists('kafka_java_produce')){
    function kafka_java_produce($topic, $data){
        try{
            $rk = new \RdKafka\Producer();
            $rk->setLogLevel(LOG_DEBUG); // 设置日志级别
            $rk->addBrokers(env('KAFKA_BROKER_JAVA','120.79.209.61')); // 添加经纪人，就是ip地址

            $conf = new \RdKafka\TopicConf();
            $conf->set("message.timeout.ms", 1000);//设置超时时间1s
            $topic = $rk->newTopic($topic,$conf); // 新建主题

            // 第一个参数：是分区。RD_KAFKA_PARTITION_UA代表未分配，并让librdkafka选择分区
            // 第二个参数：是消息标志，必须为0
            // 第三个参数：消息，如果不为NULL，它将被传递给主题分区程序
            $php_start = microtime();
            $topic->produce(RD_KAFKA_PARTITION_UA, 0, $data); // 生成并发送单个消息
            while ($rk->getOutQLen() > 0) {
                $rk->poll(50);
            }
            $seconds = get_microtime_between($php_start, microtime());
            $res = $seconds > 1? 0 : 1;
        }catch (\Exception $e) {
            save_eslog(0,3,"Kafka队列异常",'{topic:'.$topic.'}',$e);
            $res = 0;
        }
        return $res;
    }
}


/*
* 计算两个时间之间的微秒时间差
* $startTime: 开始时间
* $endTime：结束时间
* return: $waster：时间差，单位秒
*/
if (!function_exists('get_microtime_between')) {
    function get_microtime_between($startTime, $endTime)
    {
        //程序运行开始时间
        $startTime = explode(' ', $startTime);
        //程序运行结束时间
        $endTime = explode(' ', $endTime);
        $waster = round($endTime[0] + $endTime[1] - ($startTime[0] + $startTime[1]), 4);
        return $waster;
    }
}
/**
 * 获取指定时间段
 * @param string $time
 * @param bool $time_stamp 时间戳格式
 * @return array|bool
 */
function get_time_interval(string $time='today',bool $time_stamp=true){
    if(!is_string($time))return false;
    $time_interval = [];
    switch ($time){
        case 'today':
            $time_interval['start_time'] = mktime(0,0,0,date('m'),date('d'),date('Y'));
            $time_interval['end_time'] = mktime(23,59,59,date('m'),date('d'),date('Y'));
            break;
        case 'yesterday':
            $time_interval['start_time'] = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
            $time_interval['end_time'] = mktime(23,59,59,date('m'),date('d')-1,date('Y'));
            break;
        case 'this_month':
            $time_interval['start_time'] = mktime(0,0,0,date('m'),1,date('Y'));
            $time_interval['end_time'] = mktime(0,0,0,date('m')+1,1,date('Y'))-1;
            break;
        case 'last_month':
            $time_interval['start_time'] = mktime(0,0,0,date('m')-1,1,date('Y'));
            $time_interval['end_time'] = mktime(0,0,0,date('m'),1,date('Y'))-1;
            break;
        default:
            return false;
    }
    if($time_stamp==false){
        $time_interval['start_time'] = date('Y-m-d H:i:s',$time_interval['start_time']);
        $time_interval['end_time'] = date('Y-m-d H:i:s',$time_interval['end_time']);
    }
    return $time_interval;
}
/*
 * 验证手机格式
 */
if (!function_exists('is_mobile')) {
    function is_mobile($mobile)
    {
        //if(preg_match("/^1[3456789]{1}\d{9}$/",$mobile)){
        if(is_numeric($mobile)){//放宽限制，允许国外手机号使用
            return true;
        }else{
            return false;
        }
    }
}

/*
 * 截取正则匹配字符串。
 */
if (!function_exists('splitStrByRegu')) {
    function splitStrByRegu($str,$regularExpression)
    {
        $pat_array = [];
        preg_match_all ($regularExpression, $str, $pat_array);
        Log::debug(__METHOD__.' $pat_array:'.json_encode($pat_array));
        return  isset($pat_array[0]) ? $pat_array[0] : [];
    }
}

/**
 * redis存储和获取
 * type 1获取缓存  2存储缓存 3删除redis缓存
 */
if(!function_exists('redis_cache')){
    function redis_cache($db,$key,$type,$seconds=60*60,$value=''){
        $redis = \Illuminate\Support\Facades\Redis::connection($db);
        if($type==1){
            $data = $redis->get($key);
        }elseif($type==2){
            $data = $redis->setex($key,$seconds,$value);
        }elseif ($type==3){
            $data = $redis->del($key);
        }else{
            return '不存在的类型';
        }
        return $data;
    }
}

/**
 * 获取User-Agent信息
 */
if(!function_exists('get_useragent')){
    function get_useragent($num){
        $request = app(\Illuminate\Http\Request::class);
        $userAgent = $request->userAgent();
        $data = '';
        $userAgent = explode('|',$userAgent);
        if(isset($userAgent[$num]) && !empty($userAgent[$num])){
            $data = $userAgent[$num];
        }
        return $data;
    }
}
/**
 * 根据错误码获取错误信息
 */
if(!function_exists('get_err_name')){
    function get_err_name($err_code)
    {
        $key = 'maggie_err_code:' . $err_code;
        $cache = redis_cache('res3', $key, 1);
        if ($cache) {
            return $cache;
        } else {
            $stateCode = new \App\Models\StateCode();
            $_err_name = $stateCode->where(['err_code' => $err_code])->first();
            if ($_err_name) {
                redis_cache('res3',$key,2,60*60*2,$_err_name['err_name']);
                return $_err_name['err_name'];
            }
        }
        return '未知错误，请联系相关人员';//数据库不存在对应的错误码信息，请开发人员自行检查
    }

}
/**
 * 仿RPC微服务 成功返回 格式
 * @param $data
 * @return array
 */
if(!function_exists('sec')){
    function sec($data){
        return array('meta'=>['code'=>200,'mes'=>'处理成功'],'results'=>$data);
    }
}

/**
 * 仿rpc微服务 失败返回 格式
 * @param string $msg
 * @param array $data
 * @param int $code
 * @return array
 */
if(!function_exists('sec')) {
    function err($msg,$data,$code){
        return array('meta'=>['code'=>$code,'mes'=>$msg],'results'=>$data);
    }
}

/**
 * 解析寄送里面的数据
 * @param string|array $content
 * @return array
 * */
if(!function_exists('json_prase')) {
    function json_prase($content)
    {
        $data = json_decode($content,true);
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $data[$k] = is_array($v) ? $v : json_decode($v, true);
            }
        }
        return $data;
    }
}

/**
 * 返回rpc服务成功结果
 * @param string|array $content
 * @return array
 * */
if(!function_exists('rpc_success')) {
    function rpc_success($content)
    {
        $data = ['code' => 200, 'data' => $content];
        return json_encode($data);
    }
}

/**
 * 返回rpc服务失败结果
 * @param string $msg
 * @return array
 * */
if(!function_exists('rpc_error')) {
    function rpc_error($msg = '操作失败', $code = 400)
    {
        $data = ['msg' => $msg, 'code' => $code];
        return json_encode($data);
    }
}
//多线程请求
if(!function_exists('async_get_url')) {
    function async_get_url($url_array, $wait_usec = 0)
    {
        if (!is_array($url_array))
            return false;
        $wait_usec = intval($wait_usec);
        $data  = array();
        $handle = array();
        $running = 0;
        $mh = curl_multi_init(); // multi curl handler
        $i = 0;
        foreach($url_array as $url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return don't print
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 302 redirect
            curl_setopt($ch, CURLOPT_MAXREDIRS, 7);
            curl_multi_add_handle($mh, $ch); // 把 curl resource 放进 multi curl handler 里
            $handle[$i++] = $ch;
        }
        /* 执行 */
        do {
            curl_multi_exec($mh, $running);
            if ($wait_usec > 0) /* 每个 connect 要间隔多久 */
                usleep($wait_usec); // 250000 = 0.25 sec
        } while ($running > 0);
        /* 读取资料 */
        foreach($handle as $i => $ch) {
            $content = curl_multi_getcontent($ch);
            $data[$i] = (curl_errno($ch) == 0) ? $content : false;
        }
        /* 移除 handle*/
        foreach($handle as $ch) {
            curl_multi_remove_handle($mh, $ch);
        }
        curl_multi_close($mh);
        return $data;
    }
}


/**
 * 取得列表的所有数据（包括分页信息）
 * @param   $where   = [
 *        'name' => 'sakuraovq',
 *        ['status', '>=', 2],
 *        ['money', '>', 0, 'or']
 *    ];
 * select * from `table` where (`name` = ? and `status` >= ? or `money` > ?)
 * @return array|null
 **/
if(!function_exists('getAll')) {
    function getAll($table, $where = "", $select = ["*"], $orderby = "id desc", $page = 1, $limit = 10, $groupby = "", $having = "", $join = "")
    {
        if (empty($table)) return NULL;
        $page = empty($page) ? 1 : $page;
        $limit = empty($limit) ? 10 : $limit;
        $select = empty($select) ? ["*"] : $select;

        $model = \DB::table($table)->select($select);
        if (!empty($join)) {
            /**
             * $join=[
             * type =>  leftjoin/join
             * data =>  [
             *      user=>[left_val=>user_relation.d_uid,right_val=>user.id]
             *      user_role=>[left_val=>user.role_id,right_val=>user.role_id]
             *      ]
             * ]
             */
            if (isset($join['type']) && $join['type'] == "leftjoin") {
                foreach ($join['data'] as $table => $v) {
                    $model->leftJoin($table, $v['left_val'], "=", $v['right_val']);
                }
            } else {
                foreach ($join['data'] as $v) {
                    $model->join($table, $v['left_val'], "=", $v['right_val']);
                }
            }
        }
        if (!empty($where)) {
            if (is_array($where))
                $model->where($where);
            else
                $model->whereRaw($where);
        }
        if (!empty($orderby))
            $model->orderByRaw($orderby);
        if (!empty($groupby))
            $model->groupBy($groupby);
        if (!empty($having))
            $model->havingRaw($having);

        $res = $model->paginate($limit, ['*'], 'page', $page);
        return empty($res) ? null : $res;
    }
}
/**
 * 取得列表的数据（不包括分页信息）
 * @param   $where   = [
 *        'name' => 'sakuraovq',
 *        ['status', '>=', 2],
 *        ['money', '>', 0, 'or']
 *    ];
 * select * from `table` where (`name` = ? and `status` >= ? or `money` > ?)
 * @return array|null
 **/
if(!function_exists('getList')) {
    function getList($table, $where = "", $select = ["*"], $orderby = "id desc", $page = 1, $limit = 10, $groupby = "", $having = "", $join = "")
    {
        if (empty($table)) return NULL;
        $page = empty($page) ? 1 : $page;
        $limit = empty($limit) ? 10 : $limit;
        $select = empty($select) ? ["*"] : $select;

        $model = \DB::table($table)->select($select);
        if (!empty($join)) {
            if (isset($join['type']) && $join['type'] == "leftjoin") {
                foreach ($join['data'] as $table => $v) {
                    $model->leftJoin($table, $v['left_val'], "=", $v['right_val']);
                }
            } else {
                foreach ($join['data'] as $v) {
                    $model->join($table, $v['left_val'], "=", $v['right_val']);
                }
            }
        }
        if (!empty($where)) {
            if (is_array($where))
                $model->where($where);
            else
                $model->whereRaw($where);
        }
        if (!empty($orderby))
            $model->orderByRaw($orderby);
        if (!empty($groupby))
            $model->groupBy($groupby);
        if (!empty($having))
            $model->havingRaw($having);
        #\DB::connection()->enableQueryLog();#开启执行日志
        $res = $model->simplePaginate($limit, ['*'], 'page', $page);
        #print_r(\DB::getQueryLog());   //获取查询语句、参数和执行时间
        return empty($res) ? null : $res;
    }
}

/**
 * 处理金额显示格式（去掉多余的零和小数点）
 * @param $money
 * @return string
 */
if(!function_exists('moneyFormat')){

    function moneyFormat($money){
        $ret = rtrim(rtrim(sprintf("%.2f",$money),'0'),'.');
        return $ret;
    }
}

if(!function_exists('webset')){
    function webset($mark,$default=''){
        $ret = \App\Models\Webset::where('var',$mark)->value('val');
        if($ret)
            return $ret;
        else
            return $default;
    }
}

/**
 * 手机号脱敏
 * @param $mobile
 * @return string
 */
if(!function_exists('mobileFormat')){

    function mobileFormat($mobile){
        return empty($mobile)?"":substr_replace($mobile,'***',3,strlen($mobile)-7);
    }
}
/**
 * 发起异步请求，忽略返回值
 * @param $url
 * @param array $params
 * @return bool
 */
if(!function_exists('asyncPost')) {
    function asyncPost($url, $params = [])
    {
        $args = parse_url($url); //对url做下简单处理
        $host = $args['host']; //获取上报域名
        $path = $args['path'] . '?' . http_build_query($params);//获取上报地址

        $fp = fsockopen($host, 80, $error_code, $error_msg, 1);
        if (!$fp) {
            Yii::error($error_code . ' _ ' . $error_msg, __METHOD__);
            return false;
        } else {
            stream_set_blocking($fp, true);//开启了手册上说的非阻塞模式
            stream_set_timeout($fp, 1);//设置超时
            $header = "GET $path HTTP/1.1\r\n";  //注意 GET/POST请求都行 我们需要自己按照要求拼装Header http协议遵循1.1
            $header .= "Host: $host\r\n";
            $header .= "Connection: close\r\n\r\n";//长连接关闭
            fwrite($fp, $header);
            fclose($fp);
        }
    }
}


//获取用户头像 $type: 0只获取头像， 1只获取昵称， 2获取头像和昵称
if(!function_exists('getAvatar')){
    function getAvatar($uid,$default='http://avatar.xfz178.com/2020082019181677498',$type=0){
        $wechatInfo=DB::table('fanli_user_webnames')->where("uid",$uid)->first();
        switch ($type){
            case 0:
                if ($wechatInfo and !empty($wechatInfo->headimg)) {
                    if (strpos($wechatInfo->headimg,"avatar.xfz178.com")!== false) {
                        $_img = explode('?', $wechatInfo->headimg);
                        $res = $_img[0] . '?v=' . rand(10000, 99999);
                    }else{
                        $res = $wechatInfo->headimg;
                    }
                } else {
                    $res = $default;//默认头像
                }
                break;
            case 1:
                if ($wechatInfo and !empty($wechatInfo->webname)) {
                    $res = $wechatInfo->webname;
                } else {
                    $res =  "";//默认昵称
                }
                break;
            default:
                $res = [];
                if ($wechatInfo and !empty($wechatInfo->headimg)) {
                    if (strpos($wechatInfo->headimg,"avatar.xfz178.com")!== false) {
                        $_img = explode('?', $wechatInfo->headimg);
                        $res['avatar'] = $_img[0] . '?v=' . rand(10000, 99999);
                    }else{
                        $res['avatar'] = $wechatInfo->headimg;
                    }
                } else {
                    $res['avatar'] = $default;//默认头像
                }
                if ($wechatInfo and !empty($wechatInfo->webname)) {
                    $res['webname'] = $wechatInfo->webname;
                } else {
                    $res['webname'] =  "";//默认昵称
                }
                break;
        }
        return $res;
    }
}

//验证远程文件是否存在
if(!function_exists('webfile_exists')) {
    function webfile_exists($url,$timeout=5)
    {
        if(empty($url)){
            return false;
        }
        $ch = curl_init();
        //$timeout = 10;
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);//将文件的信息作为数据流输出
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);//将获取的信息以字符串返回
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);//设置等待时间
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);//禁止验证对等证书

        curl_exec($ch);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);//获取请求状态码
        //print_r("状态码为：{$http_code}");
        curl_close($ch);
        if($http_code == '200'){
            return true;
        }
        return false;

    }
}
if (!function_exists("changeTime")) {
    function changeTime($time)
    {
        $_time = time() - $time;
        switch ($_time) {
            case $_time < 3600://小于1小时，以‘n分钟前’显示
                $time = floor($_time / 60) . '分钟前';
                break;
            case 3600 <= $_time && $_time < 86400://大于一小时小于一天 以“N小时前”显示
                $time = floor($_time / 3600) . '小时前';
                break;
            case 86400 <= $_time && $_time < 864000://大于一天小于10天 以‘N天前’显示
                $time = floor($_time / 86400) . '天前';
                break;
            default:
                $time = date('Y-m-d', $time);
                break;
        }
        return $time;
    }
}

/**
 * 通过id获取索引表名
 * @return bool|string
 * $id   订单ID
 */
if(!function_exists('getIndexTableNameByTradeId')){
    function getIndexTableNameByTradeId($id){
        $_indexNum=floor($id/10000000);
        $_indexNum=$_indexNum<20?0:$_indexNum;
        $_tableName="fanli_mingxi_new_history_id_".$_indexNum;
       if(Schema::hasTable($_tableName)){//查看是否有对应的索引表
            unset($_indexNum);
            return $_tableName;
        }else{
            unset($_indexNum,$_tableName);
            return false;
        }
    }
}

/**
 * 获取角色对应的字段数据
 * @param int $level
 * @return  string
 * */
if(!function_exists('getUserRoleField')) {
    function getUserRoleField($level, $field = "icon_team")
    {
        $redis = \Illuminate\Support\Facades\Redis::connection('res1');
        $role_field = $redis->get("user_role_{$field}:{$level}");
        if (empty($role_field)) {
            $role = \Illuminate\Support\Facades\DB::table("fanli_user_role")->where("level", $level)->first();
            $redis->set("user_role_{$field}:{$level}", $role->$field);
            $role_field = $role->$field;
        }
        return $role_field;
    }
}

/**
 * 获取客户端ip地址
 * @return  string
 * */
if(!function_exists('getClientRealIp')) {
    function getClientRealIp()
    {
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ips = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = $ips[0];
        }elseif($_SERVER['REMOTE_ADDR']!=''){
            $ip = $_SERVER['REMOTE_ADDR'];
        }else{
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        return $ip;
    }
}

/**
 * 生成随机字母加数字 字符串
 * @param int $len 要生成字符串长度
 * @param null $chars 要生成字符串包含的字符
 * @return string   生成的字符串
 */
if(!function_exists('getRandomString')) {
    function getRandomString($len = 6, $chars = null)
    {
        if (is_null($chars)) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        }
        mt_srand(10000000 * (double)microtime());
        for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < $len; $i++) {
            $str .= $chars[mt_rand(0, $lc)];
        }
        return $str;
    }
}
/**
 * 数据脱敏
 * @param $string 需要脱敏值
 * @param int $start 开始
 * @param int $length 结束
 * @param string $re 脱敏替代符号
 * @return bool|string
 * 例子:
 * dataDesensitization('18811113683', 3, 4); //188****3683
 * dataDesensitization('乐杨俊', 0, -1); //**俊
 */
if (!function_exists('dataDesensitization')) {
    function dataDesensitization($string, $start = 0, $length = 0, $re = '*')
    {
        if (empty($string)){
            return false;
        }
        $strarr = array();
        $mb_strlen = mb_strlen($string);
        while ($mb_strlen) {//循环把字符串变为数组
            $strarr[] = mb_substr($string, 0, 1, 'utf8');
            $string = mb_substr($string, 1, $mb_strlen, 'utf8');
            $mb_strlen = mb_strlen($string);
        }
        $strlen = count($strarr);
        $begin = $start >= 0 ? $start : ($strlen - abs($start));
        $end = $last = $strlen - 1;
        if ($length > 0) {
            $end = $begin + $length - 1;
        } elseif ($length < 0) {
            $end -= abs($length);
        }
        for ($i = $begin; $i <= $end; $i++) {
            $strarr[$i] = $re;
        }
        if ($begin >= $end || $begin >= $last || $end > $last) return false;
        return implode('', $strarr);
    }
}
