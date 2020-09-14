<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Work;

class WorksController extends AdminBaseController
{
    public function index()
    {
        $works = Work::all();

        return view('admin.works.index', compact('works'));
    }

    public function create()
    {
        return view('admin.works.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);
        Work::create($request->all());

        return redirect()->route('works.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $work = Work::find($id);

        return view('admin.works.edit', compact('work'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required'
        ]);

        $work = Work::find($id);
        $work->update($request->all());

        return redirect()->route('works.index');
    }

    public function destroy($id)
    {
        Work::find($id)->delete();

        return redirect()->route('works.index');
    }
}
