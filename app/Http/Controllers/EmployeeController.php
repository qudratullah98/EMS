<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employee=employee::get();
        return view("employee.index",["employee"=>$employee]);
    }
}
