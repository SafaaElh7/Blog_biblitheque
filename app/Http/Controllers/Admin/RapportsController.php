<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use App\Models\User;
use Illuminate\Http\Request;

class RapportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rapports = User::select()->join('rapports', 'users.id', '=', 'rapports.userId')
            ->select('rapports.description', 'rapports.amend', 'rapports.id', 'users.name', 'users.cin')
            ->get();
        return view('admin.rapports.index', compact('rapports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('admin.rapports.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Rapport::create([
            'userId' => $request->cin,
            'description' => $request->desc,
            'amend' => $request->amend

        ]);
        return to_route('admin.rapports.index');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rapport $rapport)
    {
        $rapport->delete();
        return to_route('admin.rapports.index');
    }
}
