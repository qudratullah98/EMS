<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $department=department::get();
        return response()->json($department);
    }
    public function getData(department $id){
        return response()->json($id);
    }
}
