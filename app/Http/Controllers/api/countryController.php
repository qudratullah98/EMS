<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\country;
use Illuminate\Http\Request;

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
}
