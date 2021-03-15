<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;
use App\Models\Role;
use App\Models\PlanCode;
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
        $plans = PlanCode::all();

        return view('users.user-create', compact('roles', 'plans'));
    }

    public function store(Request $request)
    {   
        try {
            $validator = $this->valid('user', $request);
            if($validator->fails()) return $this->redirectFailure('user-create', $validator);
            
            DB::beginTransaction();
            
            $user = User::create_standard($request);
            $plan = PlanCode::find($request->plan_id);

            if($request->role_code == '77') {
                $user->provider()->create();
                $user->provider->plan()->create([
                    'plan_code_id' => $plan->id,
                    'max_hotels' => $plan->code == 44 ? $request->max_hotels : $plan->max_hotels,
                    'max_users' => $plan->code == 44 ? $request->max_users : $plan->max_users,
                    'description' => $request->description
                ]);
            }

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
        $plans = PlanCode::all();

        return view('users.user-edit', compact('user', 'roles', 'plans'));
    }

    public function update(Request $request)
    {
        try {
            $validator = $this->valid('user_update', $request, $request->id);
            if($validator->fails()) return $this->redirectFailure('user-edit', $validator);

            DB::beginTransaction();

            $user = User::find($request->id);
            $plan = PlanCode::find($request->plan_id);

            $user->update([
                'name' => $request->name,
            ]);

            if($user->role->code == 77) {
                $user->provider->plan()->update([
                    'plan_code_id' => $plan->id,
                    'max_hotels' => $plan->code == 44 ? $request->max_hotels : $plan->max_hotels,
                    'max_users' => $plan->code == 44 ? $request->max_users : $plan->max_users,
                    'description' => $request->description
                ]);
            }

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
