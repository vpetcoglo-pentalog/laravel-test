<?php

namespace App\Http\Controllers;

use App\Http\Requests\Advert\AdvertCreateRequest;
use App\Http\Requests\Advert\AdvertDeleteRequest;
use App\Http\Requests\Advert\AdvertUpdateRequest;
use App\Models\Advert;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(AdvertCreateRequest $advert)
    {
        $advert = new Advert($advert->validated());

        $advert->user_id = Auth::id();
        $advert->save();

        return redirect()->back()->with('message', 'Success');
    }

    /**
     * @param Advert $advert
     * @return Factory|\Illuminate\Contracts\View\View
     */
    public function show(Advert $advert)
    {
        return view('advert.show', compact('advert'));
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
     * @param AdvertUpdateRequest $advertPostData
     * @param int $advertId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdvertUpdateRequest $request, Advert $advert)
    {
        $advert->update($request->validated());
        $advert->save();

        return redirect()->back()->with('message', 'Success');
    }

    /**
     * @param int $advert_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AdvertDeleteRequest $request, Advert $advert)
    {
        $advert->delete();
        return redirect()->back()->with('message', 'Success');
    }
}
