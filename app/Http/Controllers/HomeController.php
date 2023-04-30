<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Livre;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard')->with([
            // 'user' => User::find($request->id),
            'livres' => Livre::latest()->paginate(4),
            'categories' => Category::has('livres')->get()
        ]);
    }

    public function getProductbyCategory(Category $category)
    {
        $livres = $category->livres()->paginate(10);
        return view('dashboard')->with([
            'livres' => $livres,
            'categories' => Category::has('livres')->get()
        ]);
    }
}
