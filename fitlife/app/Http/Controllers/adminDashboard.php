<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminDashboard extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'links' => [
                'products'  => url('admin/products'),
                'membership-plans'     => url('admin/membership-plans'),
            ]
        ]);
    }
}

