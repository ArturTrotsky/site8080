<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Brigade;

class BrigadesController extends AdminBaseController
{
    public function index()
    {
        $brigades = Brigade::all();

        return view('admin.brigades.index', compact('brigades'));
    }

    public function create()
    {
        return view('admin.brigades.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);
        Brigade::create($request->all());

        return redirect()->route('brigades.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brigade = Brigade::find($id);

        return view('admin.brigades.edit', compact('brigade'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
        ]);

        $brigade = Brigade::find($id);
        $brigade->update($request->all());

        return redirect()->route('brigades.index');
    }

    public function destroy($id)
    {
        Brigade::find($id)->delete();

        return redirect()->route('brigades.index');
    }
}
