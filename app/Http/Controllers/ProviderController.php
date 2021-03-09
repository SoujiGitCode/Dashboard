<?php

namespace App\Http\Controllers;

use App\Models\PlanCode;
use App\Models\Provider;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $distributors= Provider::all();

        return view('providers.distributors-list', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $providers = Provider::find($id);
        $plancodes = Plancode::all();
        $plan =  DB::table('plans')->where('provider_id', $providers->id)->first();


        return view('providers.provider-edit', compact('providers', 'plancodes', 'plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->status);

        try {
            $validator = $this->valid('status_update', $request, $request->id);

            if ($validator->fails()) {
                return redirect('distributors-list')
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

            $distributors = Provider::all();

            return view('providers.distributors-list', compact('distributors'));

        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            // return $th;
            // return redirect('/user-create')->withErrors($th->getMessage())->withInput();
        }
    }

    public function updateprovider(Request $request)
    {
        //dd($request->plan_id);

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
                'alias' => $request->alias,
                'hotels' => $request->hotels,
                'status' => $request->status,
            ]);

            $plan->update([
                'max_users' => $request->max_users,
                'max_hotels' => $request->max_hotels,
                'plan_code_id' =>$request->plan_id,
            ]);


            DB::commit();

            $distributors = Provider::all();

            return view('providers.distributors-list', compact('distributors'));

        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            // return $th;
            // return redirect('/user-create')->withErrors($th->getMessage())->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
