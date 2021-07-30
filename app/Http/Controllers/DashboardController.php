<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): Renderable
    {
        $adverts = Advert::query()->paginate(20);
        $categories = Category::query()->with('children')->paginate(20);

        return view('dashboard.dashboard', compact('adverts', 'categories'));
    }

    public function adverts(): Renderable
    {
        $adverts = Advert::query()->paginate(20);

        return view('dashboard.adverts', compact('adverts'));
    }
}
