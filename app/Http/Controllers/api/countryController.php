<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\country;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Psy\CodeCleaner\ReturnTypePass;

class countryController extends Controller
{
    public function index(){
        return response()->json(country::get());
       }
    public function store(Request $req){
        $country =country::create([

            "country_code"=>$req->country_code,
              "name"=>$req->country,
        ]);
        return response()->json($country);
       }
       public function destroy(country $id){
            $id->delete();
            return response()->json(["message"=>"data deleted !"]);
       }
       public function Edit(country $id){
            return response()->json($id);
       }
}
