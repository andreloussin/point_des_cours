<?php

namespace App\Http\Controllers;

use App\Models\Ecu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class EcuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resp = false;
        try {
            $resp = DB::table('etudiant_responsables')
                ->where('user_id', '=', Auth::user()->id)
                ->count() > 0;
        } catch (\Throwable $th) {
        }
        return Inertia::render('Ecus/Index', ['ecus' => Ecu::paginate(),'can_edit'=>$resp]);
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
     * @param  \App\Models\Ecu  $ecu
     * @return \Illuminate\Http\Response
     */
    public function show(Ecu $ecu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ecu  $ecu
     * @return \Illuminate\Http\Response
     */
    public function edit($ecu_id)
    {
        return Inertia::render('Ecus/Edit', ['ecu' => Ecu::find($ecu_id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ecu  $ecu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$ecu_id)
    {
        $ecu =  Ecu::find($ecu_id);
        $heures = $request->input('heures');
        if($ecu && $heures){
            $ecu->masse_horaire_ecoule = $ecu->masse_horaire_ecoule + $heures;
            $ecu->save();
        }
        return  redirect()->route('ecus');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ecu  $ecu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ecu $ecu)
    {
        //
    }
}
