<?php

namespace App\Http\Controllers\Metrology\Admin;


class PanelController extends AdminBaseController
{
    public function index()
    {
        return view('admin.panel.index');
    }
}
