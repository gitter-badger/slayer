<?php

namespace App\Controllers;

use Bootstrap\Facades\View;

class WelcomeController extends Controller
{
    public function showSignatureAction()
    {
        return View::make('welcome');
    }
}