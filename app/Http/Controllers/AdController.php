<?php

namespace App\Http\Controllers;

use App\Models\Adverb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdController extends Controller
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
        $adverb = new Adverb($request->all());
        $adverb->user_id = Auth::id();
        $adverb->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adverb  $adverb
     * @return \Illuminate\Http\Response
     */
    public function show(Adverb $adverb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adverb  $adverb
     * @return \Illuminate\Http\Response
     */
    public function edit(Adverb $adverb)
    {
        //
    }

    /**
     * @param Request $request
     * @param Adverb $adverb
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $ad_id)
    {
        $adverb = Adverb::find($ad_id);
        dd($adverb);

        if (!Gate::allows('owner', $adverb)) {
            abort(403);
        }

        $adverb->title = $request->get('title');
        $adverb->description = $request->get('description');
        $adverb->price = $request->get('price');
        $adverb->save();

        return redirect()->back();
    }

    /**
     * @param int $adverb_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Adverb $adverb)
    {
        $adverb->delete();
        return redirect()->back();
    }
}
