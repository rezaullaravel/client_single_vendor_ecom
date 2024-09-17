<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{



    //admin dashboard
    public function adminDashboard(){
        return view('admin.home.dashboard');
    }//end method


    //admin logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect('/admin/login');
    }//end method













}//end class
