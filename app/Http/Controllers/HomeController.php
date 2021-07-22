<?php

namespace App\Http\Controllers;

use App\Models\Adverb;
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
        $adverbs = Adverb::with('category');

        if ((int)$category) {
            $adverbs->where('category_id', $category);
        }

        $adverbs = $adverbs->get();

        return view('welcome', compact('adverbs'));
    }
}
