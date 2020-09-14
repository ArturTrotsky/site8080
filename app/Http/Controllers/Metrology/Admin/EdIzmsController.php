<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Edizm;

class EdIzmsController extends AdminBaseController
{
    public function index()
    {
        $edizms = Edizm::all();

        return view('admin.edizms.index', compact('edizms'));
    }

    public function create()
    {
        return view('admin.edizms.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);
        Edizm::create($request->all());

        return redirect()->route('edizms.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edizm = Edizm::find($id);

        return view('admin.edizms.edit', compact('edizm'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
        ]);

        $edizm = Edizm::find($id);
        $edizm->update($request->all());

        return redirect()->route('edizms.index');
    }

    public function destroy($id)
    {
        Edizm::find($id)->delete();

        return redirect()->route('edizms.index');
    }
}
