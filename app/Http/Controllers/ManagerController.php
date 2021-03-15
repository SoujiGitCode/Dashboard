<?php

namespace App\Http\Controllers;

use App\Models\PlanCode;
use App\Models\Provider;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends WebController
{
    public function index()
    {
        $distributors=DB::table('providers')
            ->join('users', 'providers.user_id',  'users.id')
            ->join('plans', 'providers.id',  'provider_id')
            ->join ('plan_codes', 'plans.plan_code_id',  'plan_codes.id')
            ->select('users.name', 'providers.id', 'providers.status' ,'plans.max_hotels', 'plans.max_users',
                'plan_codes.description AS planDescription' )
            ->where('users.role_id', '4')
            ->get();
        //dd($distributors);

        return view('providers.managers-list', compact('distributors'));
    }

    public function edit($id)
    {
        $providers = Provider::find($id);
        $plancodes = Plancode::all();
        $plan =  DB::table('plans')->where('provider_id', $providers->id)->first();


        return view('providers.provider-edit', compact('providers', 'plancodes', 'plan'));
    }

    public function update(Request $request)
    {
        try {
            $validator = $this->valid('status_update', $request, $request->id);

            if ($validator->fails()) {
                return redirect('managers-list')
                    ->withErrors($validator)
                    ->withInput();
            }


            $changestatus='0';
            DB::beginTransaction();

            $provider= Provider::find($request->id);

            if ($request->status=='0'){
                $changestatus='1';
            }
            $provider->update([
                'status' => $changestatus,
            ]);

            DB::commit();

            $distributors=DB::table('providers')
                ->join('users', 'providers.user_id',  'users.id')
                ->join('plans', 'providers.id',  'provider_id')
                ->join ('plan_codes', 'plans.plan_code_id',  'plan_codes.id')
                ->select('users.name', 'providers.id', 'providers.status' ,'plans.max_hotels', 'plans.max_users',
                    'plan_codes.description AS planDescription' )
                ->where('users.role_id', '4')
                ->get();


            return view('providers.managers-list', compact('distributors'));

        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    public function updateprovider(Request $request)
    {
        try {
            $validator = $this->valid('status_update', $request, $request->id);

            if ($validator->fails()) {
                return redirect('provider-edit{'.$request->id.'}')
                    ->withErrors($validator)
                    ->withInput();
            }

            DB::beginTransaction();

            $provider= Provider::find($request->id);
            $plan =  DB::table('plans')->where('provider_id', $request->id)->limit(1);

            $provider->update([
                'status' => $request->status,
            ]);

            //dd($plan->id);
            $plan->update([
                'max_users' => $request->max_users,
                'max_hotels' => $request->max_hotels,
                'plan_code_id' =>$request->plan_id,
            ]);


            DB::commit();

            $distributors=DB::table('providers')
                ->join('users', 'providers.user_id',  'users.id')
                ->join('plans', 'providers.id',  'provider_id')
                ->join ('plan_codes', 'plans.plan_code_id',  'plan_codes.id')
                ->select('users.name', 'providers.id', 'providers.status' ,'plans.max_hotels', 'plans.max_users',
                    'plan_codes.description AS planDescription' )
                ->where('users.role_id', '4')
                ->get();

            return view('providers.managers-list', compact('distributors'));

        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

}
