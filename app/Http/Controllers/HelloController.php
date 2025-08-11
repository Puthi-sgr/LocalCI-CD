<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(): Response
    {
        $data = [
            'message' => 'hello',
        ];
        return response($data, 200)
        //return json
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}