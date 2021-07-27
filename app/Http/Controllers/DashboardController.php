<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adverts = Advert::paginate(20);
        $categories = Category::query()->with('children')->get();
        return view('admin.dashboard', compact('adverts', 'categories'));
    }
}
