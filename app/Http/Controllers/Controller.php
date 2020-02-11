<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use mysqli;
use DB;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 
    public function index(){
      
        $tables = \DB::select('SHOW DATABASES'); 
        $tables=(array)$tables;
        $database=array();    
        foreach($tables as $table)
        {
            array_push($database, $table->Database);
        }
          // $d=array();
        // print_r($database);exit;
        // for($i=1;$i<10;$i++)
        // {
        //     $d[$i]=(array)(\DB::select('SHOW TABLES from '.$t[$i]));
        // }
       // print_r($d);exit;        
    return view('database', compact('database'));
 }


 
 public function showtable(Request $request) {
    $name1 = $request->input('database');
    $name =  \DB::select('SHOW TABLES from '.$name1);
    

    $table =array();
   
    foreach($name as $name){
        $n=(array)$name;
  
        array_push($table, $n['Tables_in_'.$name1]);
    }
    //   print_r($table);exit();
     
    return Response::json($table);
    
  

 }
 public function savetable(){

    // $toDay = 'backups/'.date('d-m-Y-H-i-s');
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'password';
    $dbname = 'Datatable';

    exec("mysqldump --user=$dbuser --password='$dbpass' --host=$dbhost $dbname users  > /home/inam/Downloads/users.sql");
    dd(1234);
 }
}
