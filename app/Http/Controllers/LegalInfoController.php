<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\View\View;

class LegalInfoController extends Controller 
{
    public function index(): View
    {
        return view('pages.legal-info');
    }

}