<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryCategoryController extends Controller
{
    public function index()
    {
        return view('admin.history-category.index');
    }

public function create()
    {
        return view('admin.history-category.create');
    }

    public function edit($id)
    {
        return view('admin.history-category.edit', compact('id'));
    }
}
