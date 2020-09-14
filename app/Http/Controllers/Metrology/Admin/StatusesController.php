<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Status;

class StatusesController extends AdminBaseController
{
    public function index()
    {
        $statuses = Status::all();

        return view('admin.statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.statuses.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);
        Status::create($request->all());

        return redirect()->route('statuses.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $status = Status::find($id);

        return view('admin.statuses.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
        ]);

        $status = Status::find($id);
        $status->update($request->all());

        return redirect()->route('statuses.index');
    }

    public function destroy($id)
    {
        Status::find($id)->delete();

        return redirect()->route('statuses.index');
    }
}
