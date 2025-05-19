<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Show the home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }


    public function previewCar()
    {
        return view('frontend.preview-car');
    }
}
