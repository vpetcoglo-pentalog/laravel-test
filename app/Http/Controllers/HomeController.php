<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, ?Category $category)
    {
        if ($category) {
            $adverts = $category->adverts()->paginate(20);
        } else {
            $adverts = Advert::query()->paginate(20);
        }

        return view('welcome', compact('adverts'));
    }
}
