<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class HomeController extends BackendController
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home');
    }
}
