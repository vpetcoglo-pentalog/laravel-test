<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(?Category $filterCategory)
    {
        if ($filterCategory->id) {
            $adverts = $filterCategory->adverts()->with('user')->paginate(20);
        } else {
            $adverts = Advert::query()->with('user')->paginate(20);
        }

        return view('home', compact('adverts', 'filterCategory'));
    }

    /**
     * @return RedirectResponse
     */
    public function home(): RedirectResponse
    {
        return redirect()->route('home');
    }
}
