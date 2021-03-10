<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends WebController
{

    public function index()
    {
        $users = User::all();

        return view('users.users-list', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('slug', '<>', 'vip')->get();

        return view('users.user-create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $validator = $this->valid('user', $request);
            if($validator->fails()) return $this->redirectFailure('user-create', $validator);

            DB::beginTransaction();


            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id
            ]);
            DB::commit();

            $users = User::all();

            return view('users.users-list', compact('users'));

        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::where('slug', '<>', 'vip')->get();

        return view('users.user-edit', compact('user', 'roles'));
    }

    public function update(Request $request)
    {
        try {
            $validator = $this->valid('user_update', $request, $request->id);
            if($validator->fails()) return $this->redirectFailure('user-edit', $validator);

            DB::beginTransaction();

            $user = User::find($request->id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id
            ]);

            DB::commit();

            $users = User::all();

            return view('users.users-list', compact('users'));

        } catch (\Throwable $th) {
            DB::rollback();
            abort(500);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->delete();
            DB::commit();

            $users = User::all();

            return view('users.users-list', compact('users'));
        } catch (\Throwable $th) {
            DB::rollback();
            abort(500);
        }

    }
}
