<?php

namespace App;

use Jenssegers\Mongodb\MongodbServiceProvider as Moloquent;
use DB;

class Mgdb extends Moloquent {

    //protected $collection = 'mongodb';
    //protected $connection = 'test';

    public static function connectionMongodb($tables)
    {
        return $users = DB::connection('mongodb')->collection($tables);
    }

    public static function test() {
        $users = self::connectionMongodb('users')->get();
        dd($users);
    }
}
