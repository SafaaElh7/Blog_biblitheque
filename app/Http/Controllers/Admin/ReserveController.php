<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $reserves = User::select()->join('reserves', 'users.cin', '=', 'reserves.user_cin')
            ->select('reserves.id', 'reserves.nom_livre', 'reserves.statut', 'reserves.duree', 'users.cin', 'users.name', 'users.tel')
            ->get();
        return view('admin.reserves.index')->with(['reserves' => $reserves]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->view('create')->with([
            // 'user' => User::find($request->id),
            // 'livres' => Livre::latest()->paginate(4),
            // 'categories' => Category::has('livres')->get()
        ]);
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        // $idU = User::where($request->user_id)->select('*')->get();
        // $idU = Livre::where($request->nom_livre)->select('*')->get();
        // $idU = $request->nom_livre;
        // $idl = Livre::where('titre' === $idU)->select('id')->get();


        // Reserve::create([
        //     'user_id' => $request->cin,
        //     'id_livre' => $request->nom_livre,
        //     'statut' => 0,
        //     'duree' => $request->dure,

        // ]);
        // return to_route('dashboard');
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
    public function edit($id)
    {
        // $livr = Reserve::select('*')->find($id);

        $livre = Reserve::select('*')->find($id);

        // $idu = $livre->user_cin;
        // $us = User::find($user_cin);

        return view('admin.reserves.edit', compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, Reserve $reserve)
    {
        Reserve::create([
            'user_cin' => $request->cin,
            'nom_livre' => $request->nom_livre,
            'statut' => $request->job_active,
            'duree' => $request->duree,
        ]);
        return to_route('admin.reserves.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Reserve::where(['id' => $id])->delete();

        return to_route('admin.reserves.index');
    }
}
