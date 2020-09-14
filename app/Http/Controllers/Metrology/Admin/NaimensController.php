<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Naimen;

class NaimensController extends AdminBaseController
{
    public function index()
    {
        $naimens = Naimen::all();

        return view('admin.naimens.index', compact('naimens'));
    }

    public function create()
    {
        return view('admin.naimens.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);
        Naimen::create($request->all());

        return redirect()->route('naimens.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $naimen = Naimen::find($id);

        return view('admin.naimens.edit', compact('naimen'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);

        $type = Naimen::find($id);
        $type->update($request->all());

        return redirect()->route('naimens.index');
    }

    public function destroy($id)
    {
        Naimen::find($id)->delete();

        return redirect()->route('naimens.index');
    }
}
