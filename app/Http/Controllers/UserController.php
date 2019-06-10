<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $data = User::all();
        $res['success'] = true;
        $res['data'] = $data;
        $res['count'] = $data->count();
        return response($res, 200);
    }
    
    public function store (Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = password_hash($request->password, PASSWORD_BCRYPT);
        $data->save();
    
        $res['success'] = true;
        return response($res, 200);
    }

    public function update (Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = password_hash($request->password, PASSWORD_BCRYPT);
        $data->save();
    
        $res['success'] = true;
        return response($res, 200);
    }

    public function show($id){
        $data = User::where('id',$id)->get();
        $res['success'] = true;
        $res['data'] = $data;
        $res['count'] = $data->count();
        return response($res);
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();

        $res['success'] = true;
        return response($res, 200);
    }
}
