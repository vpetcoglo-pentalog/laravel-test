<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $category = $request->query->get('category') ?? 0;
        $adverts = Advert::with('category');

        if ((int)$category) {
            $adverts->where('category_id', $category);
        }

        $adverts = $adverts->paginate(20);

        return view('welcome', compact('adverts'));
    }
}
