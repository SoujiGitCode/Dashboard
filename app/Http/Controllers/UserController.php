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

            if ($validator->fails()) {
                return redirect('user-create')
                    ->withErrors($validator)
                    ->withInput();
            }

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

        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            // return $th;
            // return redirect('/user-create')->withErrors($th->getMessage())->withInput();
        }
    }

    public function show(Roles $roles)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::where('slug', '<>', 'vip')->get();

        return view('users.user-edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $validator = $this->valid('user_update', $request, $request->id);

            if ($validator->fails()) {
                return redirect('user-edit')
                    ->withErrors($validator)
                    ->withInput();
            }

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
            dd($th);
            DB::rollback();
            // return $th;
            // return redirect('/user-create')->withErrors($th->getMessage())->withInput();
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
        }

    }
}
