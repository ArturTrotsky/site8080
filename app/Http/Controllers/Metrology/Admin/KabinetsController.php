<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Kabinet;

class KabinetsController extends AdminBaseController
{
    public function index()
    {
        $kabinets = Kabinet::all();

        return view('admin.kabinets.index', compact('kabinets'));
    }

    public function create()
    {
        return view('admin.kabinets.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);
        Kabinet::create($request->all());

        return redirect()->route('kabinets.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kabinet = Kabinet::find($id);

        return view('admin.kabinets.edit', compact('kabinet'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
        ]);

        $kabinet = Kabinet::find($id);
        $kabinet->update($request->all());

        return redirect()->route('kabinets.index');
    }

    public function destroy($id)
    {
        Kabinet::find($id)->delete();

        return redirect()->route('kabinets.index');
    }
}
