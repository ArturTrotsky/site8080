<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Podrazdelenie;

class PodrazdeleniesController extends AdminBaseController
{
    public function index()
    {
        $podrazdelenies = Podrazdelenie::all();

        return view('admin.podrazdelenies.index', compact('podrazdelenies'));
    }

    public function create()
    {
        return view('admin.podrazdelenies.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
            'name_full' => 'required'
        ]);
        Podrazdelenie::create($request->all());

        return redirect()->route('podrazdelenies.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $podrazdelenie = Podrazdelenie::find($id);

        return view('admin.podrazdelenies.edit', compact('podrazdelenie'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
            'name_full' => 'required'
        ]);

        $podrazdelenie = Podrazdelenie::find($id);
        $podrazdelenie->update($request->all());

        return redirect()->route('podrazdelenies.index');
    }

    public function destroy($id)
    {
        Podrazdelenie::find($id)->delete();

        return redirect()->route('podrazdelenies.index');
    }
}
