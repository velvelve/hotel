<?php

namespace App\Http\Controllers\StaticPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CosmeticProceduresController extends Controller
{
    public function index(): View
    {
        return view('pages.cosmetic-procedures');
    }
}
