<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(): Response
    {
        return response(["message" => "hello"], 200)

            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}