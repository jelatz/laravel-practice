<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return 'HELLO JELATZ';
    }

    public function show($id)
    {
        $data = array(
            "id" => $id,
            "name" => "Jlad",
            "age" => 20,
            "address" => "cebu city",
            "email" => "jladaudrey@gmail.com"
        );

        return view('user', $data);
    }
}
