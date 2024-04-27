<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ad\StoreRequest;
use App\Http\Requests\Ad\UpdateRequest;
use App\Models\Ad;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdController extends Controller
{
    public function __construct(private readonly Ad $ad)
    {
    }

    public function index(): View
    {
        return view('ads.index', ['ads' => $this->ad->all()]);
    }

    public function create(): View
    {
        return view('ads.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated() + ['user_id' => auth()->user()->id];
        $thumbnail_file = $request->file('thumbnail');

        if ($thumbnail_file) {
            $path = $thumbnail_file->store('thumbnails');
            $data += ['path' => $path];
        }

        $this->ad->create($data);

        return redirect()->route('ads.index')->withSuccess('Ad created successfuly.');
    }

    public function show(int $id): View
    {
        $ad = $this->ad->findOrFail($id);
        if (auth()->user() != $ad->user) {
            $ad->updateOrFail(['views' => $ad->views + 1]);
        }

        return view('ads.get', ['ad' => $ad]);
    }

    public function edit(Ad $ad): View
    {
        return view('ads.edit', ['ad' => $ad]);
    }

    public function update(UpdateRequest $request, Ad $ad): RedirectResponse
    {
        $ad->update($request->validated());
        return $this->redirectHome()->withSuccess('Ad updated successfuly.');
    }

    public function destroy(Ad $ad): RedirectResponse
    {
        $ad->delete();

        return $this->redirectHome()
            ->with('success', 'Ad deleted successfully');
    }

    private function redirectHome()
    {
        return redirect()->route('ads.index');
    }
}
