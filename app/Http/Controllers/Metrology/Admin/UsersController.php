<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Kabinet;
use App\Models\Metrology\Podrazdelenie;
use App\Models\Metrology\Role;
use App\Models\Metrology\User;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Metrology\UserKabinet;
use App\Models\Metrology\UserPodrazdelenie;

class UsersController extends AdminBaseController
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $lastID = User::all()->last()->id;
        $nextID = $lastID + 1;

        return view('admin.users.create', compact('nextID'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        DB::table('user_roles')->insert(['user_id' => $user->id]);
        DB::table('user_podrazdelenies')->insert(['user_id' => $user->id]);
        DB::table('user_kabinets')->insert(['user_id' => $user->id]);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        $podrazdeleniesSource = Podrazdelenie::pluck('name', 'id')->all();
        $kabinetsSource = Kabinet::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles',
            'podrazdeleniesSource', 'kabinetsSource'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'role_id' => 'required'
        ]);

        // Обновление User 'name', 'email'
        $user = User::find($id);
        $user->update($request->all());
        // Конец обновление User 'name', 'email'

        // Обновление userRole
        $userRole = $user->roles->first()->pivot;
        $userRole['role_id'] = $request['role_id'];
        $userRole->save();
        // Конец обновление userRole

        // Обновление UserPodrazdelenie
        UserPodrazdelenie::find($id)->delete();
        if ($request->podrazdelenie_id) {
            foreach ($request->podrazdelenie_id as $podrazdelenie_id) {
                UserPodrazdelenie::Create(
                    ['user_id' => $id, 'podrazdelenie_id' => $podrazdelenie_id]
                );
            }
        } else UserPodrazdelenie::Create(['user_id' => $user->id]);
        // Конец обновление UserPodrazdelenie

        // Обновление UserKabinet
        UserKabinet::find($id)->delete();
        if ($request->kabinet_id) {
            foreach ($request->kabinet_id as $kabinet_id) {
                UserKabinet::Create(
                    ['user_id' => $id, 'kabinet_id' => $kabinet_id]
                );
            }
        } else UserKabinet::Create(['user_id' => $user->id]);
        // Конец обновление UserKabinet

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index');
    }
}
