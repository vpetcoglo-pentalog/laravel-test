<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $advert = new Advert($request->all());
        $advert->user_id = Auth::id();
        $advert->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * @param Request $request
     * @param int $advert
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $advert_id)
    {
        $advert = Advert::find($advert_id);

        if (!Gate::allows('owner', $advert)) {
            abort(403);
        }

        $advert->title = $request->get('title');
        $advert->description = $request->get('description');
        $advert->price = $request->get('price');
        $advert->save();

        return redirect()->back();
    }

    /**
     * @param int $advert_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Advert $advert)
    {
        $advert->delete();
        return redirect()->back();
    }
}
