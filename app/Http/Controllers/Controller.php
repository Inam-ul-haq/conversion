<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // private $connection;
    // public function __construct()
    // {
    //     $this->connection = DB::connection('ATtechquiz1');

    // }
    public function index(){
        $tables = \DB::select('SHOW DATABASES'); 
        $tables=(array)$tables;
        $database=array();
        $d=array();


        foreach($tables as $table)
        {
            array_push($database, $table->Database);
        }
        // print_r($database);exit;
        // for($i=1;$i<10;$i++)
        // {
        //     $d[$i]=(array)(\DB::select('SHOW TABLES from '.$t[$i]));
        // }
        // print_r($d);exit;
   




     
    
    return view('database', compact('database'));
 }


 
 public function test(Request $request) {
    $name1 = $request->input('database');
    $name =  (array)(\DB::select('SHOW TABLES from '.$name1));
    
    $name = (array)$name;
    
    // print_r($name);exit;
    $table =array();
   
    foreach($name as $name){
        $n=(array)$name;
        // print_r($n['Tables_in_'.$name1]);
        array_push($table, $n['Tables_in_'.$name1]);
    }
    print_r($table);

 }
}
