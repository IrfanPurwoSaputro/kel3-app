<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }


    public function charts(){
        return view('admin.pages.charts.chartjs');
    }

    public function documentation(){
        return view('admin.pages.documentation.documentation');
    }

    public function basic_elements(){
        return view('admin.pages.forms.basic_elements');
    }

    public function mdi(){
        return view('admin.pages.icons.mdi');
    }

    public function error_404(){
        return view('admin.pages.samples.error-404');
    }

    public function error_500(){
        return view('admin.pages.samples.error-500');
    }

    public function login(){
        return view('admin.pages.samples.login');
    }

    public function register(){
        return view('admin.pages.samples.register');
    }

    public function basic_table(){
        return view('admin.pages.tables.basic-table');
    }

    public function buttons(){
        return view('admin.pages.ui-features.buttons');
    }

    public function dropdowns(){
        return view('admin.pages.ui-features.dropdowns');
    }

    public function typhography(){
        return view('admin.pages.ui-features.typhography');
    }
}
