<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TypesController extends Controller{
    public function types(Request $request){
        $query = DB::table('types')->select('types.id','types.name');

        $types = $query->get();
        return $types;
    }

}

