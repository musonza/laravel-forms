<?php

namespace Musonza\Form\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Display the Telescope view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laravel-forms::layout', [
            'cssFile' => 'app.css',
        ]);
    }
}
