<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanCode;
use App\Models\Provider;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends WebController
{
    public function index()
    {
        $plans=DB::table('plan_codes')
            ->get();
       // dd($plans);

        return view('plans.plans-list', compact('plans'));
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
       // dd($request->max_hotels_form);
        try {
            $validator = $this->valid('plan_update', $request, $request->id);


            if ($validator->fails()) {
                return redirect('plans-list')
                    ->withErrors($validator)
                    ->withInput();

            }


            DB::beginTransaction();

            $plancode= PlanCode::find($request->id);
            $planTable= Plan::where('plan_code_id', $request->id);

            //dd($planTable);

            $plancode->update([
                'max_hotels' => $request->max_hotels_form,
                'max_users' => $request->max_users_form

            ]);

            $planTable->update([
                'max_hotels' => $request->max_hotels_form,
                'max_users' => $request->max_users_form

            ]);

            DB::commit();

            $plans=DB::table('plan_codes')
                ->get();

            return view('plans.plans-list', compact('plans'));

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
                ->where('users.role_id', '5')
                ->get();

            return view('providers.managers-list', compact('distributors'));

        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

}
