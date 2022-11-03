<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\stat;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        return response()->json(city::get());
    }
    public function Edit(city $id)
    {

        return response()->json($id );
    }
    public function getstat(){
        return response()->json(stat::get());
       }
       public function store(Request $req){
        city::create($req->post());
        return response()->json(["message"=>" data inserted successfull "]);
       }
       public function destroy(city $id){
        $id->delete();
            return response()->json(["message"=>"data Deleted "]);
       }
        public function update(Request $req, city $id){
           $city= $id->update($req->post());

            return response()->json(["message"=>"Data Updated Successfully"]);
       }

}
