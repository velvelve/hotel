<?php

namespace App\Http\Controllers\StaticPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpaController extends Controller
{
    public function index(): View
    {
        return view('pages.spa');
    }
}
