<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Livre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $livres = Livre::all();
        return view('admin.livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.livres.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pos = Category::select('titre')->find($request->caregory);

        $image = $request->file('photo')->store('public/images/');

        Livre::create([
            'titre' => $request->titreL,
            'desc' => $request->desc,
            'inStock' => $request->Stock,
            'nomcategory' => $pos->titre,
            'photo' => $image,
            'category_id' => $request->caregory
        ]);
        return to_route('admin.livres.index');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Livre::select()->find($id);
        $dat = Category::select()->find($data['category_id']);

        return view('show', ['livre' => $data], ['dat' => $dat]);
    }

    // public function createlivre($id)
    // {
    //     $data = Livre::select()->find($id);
    //     $dat = Category::select()->find($data['category_id']);

    //     return view('create')->with(['livre' => $data], ['dat' => $dat]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        $categories = Category::all();
        return view('admin.livres.edit', compact('livre', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $pos = Category::select('titre')->find($request->caregory);

        $image = $livre->photo;
        if ($request->hasFile('photo')) {
            Storage::delete($livre->photo);
            $image = $request->file('photo')->store('public/livres');
        }

        $livre->update([
            'titre' => $request->titreL,
            'desc' => $request->desc,
            'inStock' => $request->Stock,
            'nomcategory' => $pos->titre,
            'photo' => $image,
            'category_id' => $request->caregory,
        ]);
        return to_route('admin.livres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();
        return to_route('admin.livres.index');
    }
}
