<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DB 接続用 class

class TopController extends Controller {
    public function index( Request $request ) {
        $sampleValue = "sample テキストです。";
        
        $records = DB::connection('mysql')->select("select * from items"); // query 実行処理 実行結果を $records に代入
        $name = $records[0]->name;

        // $insertResult = DB::connection("mysql")->insert("insert into items (id,name,price) values (null,'melon',2000)");
        // dd($insertResult);

        $updateResult = DB::connection("mysql")->update("update items set price = 600 where name = 'peach'");
        dd($updateResult);

        return view("top/index" , [ "sampleValue" => $sampleValue ]);
    }
}