<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Laboratory;

class LaboratoriesController extends AdminBaseController
{
    public function index()
    {
        $laboratories = Laboratory::all();

        return view('admin.laboratories.index', compact('laboratories'));
    }

    public function create()
    {
        return view('admin.laboratories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);
        Laboratory::create($request->all());

        return redirect()->route('laboratories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $laboratory = Laboratory::find($id);

        return view('admin.laboratories.edit', compact('laboratory'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
        ]);

        $laboratory = Laboratory::find($id);
        $laboratory->update($request->all());

        return redirect()->route('laboratories.index');
    }

    public function destroy($id)
    {
        Laboratory::find($id)->delete();

        return redirect()->route('laboratories.index');
    }
}
