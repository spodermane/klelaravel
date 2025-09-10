<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Facades\Validator;
use Illuminate\Http\JsonResponse;
class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response =[
            "ok" => false,
            "messages" =>[]
        ];
        $validate =Validator::make($request->all(),[
            "name" => "required|string",
             "email" => "required|string|unique:people,email",
             "password" =>"required|integer|confirmed",
        ]);
        if($validate->fails()) $response["messages"][] = $validate->errors();
       
        
        
        $user = New User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");

        if($user->save()) {
            $response["ok"] = true;
            $response["messages"][] = "Kullanıcı başarıyla oluşturuldu.";
        } else {
            $response["messages"][] = "Kullanıcı oluşturulurken bir hata oluştu.";
        }
    }
    }
    return response()->json($response);

