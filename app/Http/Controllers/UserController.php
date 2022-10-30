<?php

namespace App\Http\Controllers;

use App\Http\Requests\user_update_request;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\Vue;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {

        $user = user::where("name", "like", "%{$req->search}%")->orwhere("email", "like", "%{$req->search}%")->get();
        return view("user.index", ["user" => $user, "req" => $req->search]);
    }
    public function index()
    {
        $user = User::get();
        return view("user.index", ["user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validata = $request->validate([
            "name" => "required",
            "last_name" => "required",
            "email" => "required",
            "password" => "required",
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with(["message" => "User Created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $id)
    {
        return view('user.edit', ["users" => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(user_update_request $req, user $id)
    {
        if ($req->password) {
            $id->update([
                "name" => $req->name,
                "last_name" => $req->last_name,
                "email" => $req->email,
                "password" =>Hash::make( $req->password)
            ]);
        }else{
            $id->update([
                "name" => $req->name,
                "last_name" => $req->last_name,
                "email" => $req->email,
            ]);
        }



        return redirect("/user")->with(["message" => "user Updated succesful "]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $id)
    {
        $id->delete();
        return redirect()->back()->with(["message" => "User Deleted Successful"]);
    }
}
