<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ads.index', ['ads' => Ad::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255',
                'description' => 'required',
                'price' => 'required']
        );
        Ad::create($request->all() + ['user_id' => $request->user()->id]);
        return redirect()->route('ads.index')->with('success', 'Ad created successfuly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $ad = Ad::findOrFail($id);
        $ad->updateOrFail(['views' => $ad->views + 1]);

        return view('ads.get', ['ad' => $ad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
