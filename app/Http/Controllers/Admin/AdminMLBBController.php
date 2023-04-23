<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminMLBBController extends Controller
{
    public function dashboard()
    {
        return view('admin.mlbb.dashboard');
    }
}
