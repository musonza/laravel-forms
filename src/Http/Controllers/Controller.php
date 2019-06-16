<?php

namespace Musonza\Form\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function flashError($message)
    {
        Session::flash('alert-danger', $message);
    }

    public function flashSuccess($message)
    {
        Session::flash('alert-success', $message);
    }

    public function response($data = [], $view = null)
    {
    }
}
