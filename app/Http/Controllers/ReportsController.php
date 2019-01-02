<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CompileReports;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        
        $job = new CompileReports($request->reportId);
        // First Way of creating a job
        // $this->dispatch($job);

        $this->dispatch($job);
        
        return 'Action performed Successfullly';
    }
}
