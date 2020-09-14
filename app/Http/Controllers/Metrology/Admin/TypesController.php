<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Group;
use App\Models\Metrology\Kabinet;
use App\Models\Metrology\Naimen;
use App\Models\Metrology\Type;

class TypesController extends AdminBaseController
{
    public function index()
    {
        $types = Type::with('naimen', 'kabinet', 'group')->get();

        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        $naimens = Naimen::get(['id', 'name']);
        $kabinets = Kabinet::get(['id', 'name']);
        $groups = Group::get(['id', 'name']);

        return view('admin.types.create', compact('naimens', 'kabinets', 'groups'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
            'naimen_id' => 'required',
            'kabinet_id' => 'required',
            'group_id' => 'required',
        ]);

        Type::create($request->all());

        return redirect()->route('types.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $type = Type::find($id);
        $naimens = Naimen::get(['id', 'name']);
        $kabinets = Kabinet::get(['id', 'name']);
        $groups = Group::get(['id', 'name']);

        return view('admin.types.edit', compact('type', 'naimens', 'kabinets', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
            'naimen_id' => 'required',
            'kabinet_id' => 'required',
            'group_id' => 'required',
        ]);

        $type = Type::find($id);
        $type->update($request->all());

        return redirect()->route('types.index');
    }

    public function destroy($id)
    {
        Type::find($id)->delete();

        return redirect()->route('types.index');
    }
}
