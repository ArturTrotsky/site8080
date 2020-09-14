<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Group;

class GroupsController extends AdminBaseController
{
    public function index()
    {
        $groups = Group::all();

        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
            'name_full' => 'required'
        ]);
        Group::create($request->all());

        return redirect()->route('groups.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $group = Group::find($id);

        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => 'required',
            'name_full' => 'required'
        ]);

        $group = Group::find($id);
        $group->update($request->all());

        return redirect()->route('groups.index');
    }

    public function destroy($id)
    {
        Group::find($id)->delete();

        return redirect()->route('groups.index');
    }
}
