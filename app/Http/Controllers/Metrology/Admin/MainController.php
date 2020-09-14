<?php

namespace App\Http\Controllers\Metrology\Admin;


class MainController extends AdminBaseController
{
    public function index()
    {
        return view('admin.main.index');
    }
}
