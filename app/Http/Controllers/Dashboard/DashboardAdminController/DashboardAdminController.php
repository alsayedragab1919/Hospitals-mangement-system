<?php

namespace App\Http\Controllers\Dashboard\DashboardAdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index(){
        
        return view('Dashboard.Admin.dashboard');
    }
}
