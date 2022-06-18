<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Tools\TestContract;


class TestSpController extends Controller
{
    protected $testContract;

    //依赖注入
    public function __construct(TestContract $testContract){
        $this->testContract = $testContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @author LaravelAcademy.org
     */
    public function index()
    {
        //$test = App::make('test');
        //$test->callMe('TestController');
        return $this->testContract->callMe('TestController');
    }


}
