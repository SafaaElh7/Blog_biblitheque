<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;

class ReservcliContror extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request)
    {

        // $idU = User::where($request->cin)->select('*')->get();
        // // $idU = Livre::where($request->nom_livre)->select('*')->get();
        // // $idU = $request->nom_livre;
        // $id = $request->cin;
        // $idl = User::where('cin' == $id)->select('id')->get();

        // $pos = User::select('*')->find($request->cin);

        Reserve::create([
            'user_cin' => $request->cin,
            'nom_livre' => $request->nom_livre,
            'statut' => 0,
            'duree' => $request->dure,

        ]);
        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
