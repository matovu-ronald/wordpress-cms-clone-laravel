<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\contracts\Config\Repository;

class WelcomeController extends Controller
{
    protected $config;

    public function __construct(Repository $config) {
        $this->config = $config;
    }
    public function test(Repository $config)
    {
        // constructor injection
        // return $this->config->get('database.default');
        // method injection
        // return $config->get('database.default');
        // Facade
        // return \Config::get('database.default', 'default');
        return config('database.default');
    }
}
