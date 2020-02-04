<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
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
            $t=array();
            $d=array();
            foreach($tables as $table)
            {
                array_push($t, $table->Database);
            }
            for($i=1;$i<10;$i++)
            {
                $d[$i]=(array)(\DB::select('SHOW TABLES from '.$t[$i]));
            }
            print_r($d);exit;
            //   $connection = 'ATtechquiz1';
        // $tables = \DB::select('USE ATtechquiz1'); 
         $tables = DB::connection('')->select('SHOW TABLES');
         dd($tables);



        //  $tables =  DB::connection('')->select('SHOW TABLES')->get();
        //  $tables = array_map('current',$tables);
        //  dd(tables); 

        $db_ext = \DB::connection('ATtechquiz1');
        //  dd($db_ext);
        $countries = $db_ext->select('SHOW TABLES');
        print_r($countries);


        //  DB::connection('mysql2')  
        // $pdo = DB::connection('ATtechquiz1')->getPdo();

        // if($pdo)
        //    {
        //      echo "Connected successfully to database ".DB::connection()->getDatabaseName();
        //    } else {
        //      echo "You are not connected to database";
        //    }
           
        //  $this->connection->getDatabaseName()
         $tables = DB::select('SHOW TABLES');
            foreach($tables as $table)
            {
                echo $table->Tables_in_db_name;
            }

         
         
         
        //  $tables = \DB::select('SHOW TABLES');        
        //  $tables = array_map('current',$tables);
         
        
        return view('database', compact('table'));
     }
}
