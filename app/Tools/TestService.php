<?php
/**
 * Created by 157908152@qq.com.
 * User: Robin
 * Date: 2018/6/30 0030
 * Time: 下午 16:39
 */

namespace App\Tools;
use App\Tools\TestContract;

class TestService implements TestContract
{
    public function callMe($controller)
    {
        dd('Call Me From TestServiceProvider In '.$controller);
    }
}