<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdController extends Controller
{
    public function index()
    {
        return view('ads.index', ['ads' => Ad::all()]);
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required']
        );
        $thumbnail_file = $request->file('thumbnail');
        if ($thumbnail_file) {
            $path = $thumbnail_file->store('thumbnails');
            $request->merge(['path' => $path])->all();
        }

        Ad::create($request->merge(['user_id' => auth()->user()->id])->all());

        return redirect()->route('ads.index')->with('success', 'Ad created successfuly.');
    }

    public function show(int $id): View
    {
        $ad = Ad::findOrFail($id);
        auth()->user() != $ad->user && $ad->updateOrFail(['views' => $ad->views + 1]);

        return view('ads.get', ['ad' => $ad]);
    }

    public function edit(Ad $ad)
    {
        return view('ads.edit', ['ad' => $ad]);
    }

    public function update(Request $request, $ad)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $ad->update($request->all());
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('ads.index')
            ->with('success', 'Ad deleted successfully');
    }
}
