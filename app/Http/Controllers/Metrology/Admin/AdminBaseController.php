<?php

namespace App\Http\Controllers\Metrology\Admin;

use App\Http\Controllers\Metrology\BaseController;

abstract class AdminBaseController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status.admin');
    }
}
