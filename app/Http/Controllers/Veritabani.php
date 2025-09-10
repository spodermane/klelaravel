<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use DB;

class Veritabani extends Controller
{
    public function add()
    {
        DB::table("bilgiler")->insert([
            "name",
            "password",
            "mail",
        ]);
    }
}
