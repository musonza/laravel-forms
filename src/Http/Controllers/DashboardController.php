<?php

namespace Musonza\Form\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display the view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cssFile = config('laravel_forms.dashboard_css_file');

        return view('laravel-forms::layout', [
            'cssFile' => $cssFile,
        ]);
    }
}
