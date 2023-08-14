<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['modul'] ="dashboard";
        $this->data['title'] = "dashboard";
    }

    public function index()
    {
        return view('dashboard/index',$this->data);
    }
}
