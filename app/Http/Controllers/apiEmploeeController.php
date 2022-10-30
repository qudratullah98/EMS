<?php

namespace App\Http\Controllers;

use App\Http\Requests\emloyeeData;
use App\Models\city;
use App\Models\country;
use App\Models\department;
use App\Models\employee;
use App\Models\stat;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class apiEmploeeController extends Controller
{
    public function index(){
        $emp=employee::get();
        return response()->json($emp);
    }
    public function getdata(){
        $country=country::get();
        return response()->json($country);
    }
    public function getStat( $id){
        $stat=stat::where("country_id",$id)->get();
        return response()->json($stat);
    }
    public function getCity( $id){
        $city=city::where("stat_id",$id)->get();
        return response()->json($city);
    }
    public function save(emloyeeData $req){
        $emp=employee::create([
            "name"=>$req->name,
            "last_name"=>$req->last_name,
            "addrass"=>$req->address,
            "country_id"=>$req->country,
            "stat_id"=>$req->stats,
            "city_id"=>$req->city,
            "department_id"=>$req->department,
        ] );
        return response()->json($emp);
    }
    public function getDepartment(){
        $department=department::get();
        return response()->json($department);
    }
    public function destroy(employee $id){
        $id->delete();
        return response()->json("employee deleted");
    }
    public function update(employee $id)
    {
        return response()->json($id);
    }
}
