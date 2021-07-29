<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(?Category $category)
    {
        if ($category->id) {
            $adverts = $category->adverts()->with('user')->paginate(20);
        } else {
            $adverts = Advert::query()->with('user')->paginate(20);
        }

        return view('home', compact('adverts', 'category'));
    }

    /**
     * @return RedirectResponse
     */
    public function home(): RedirectResponse
    {
        return redirect()->route('home');
    }
}
