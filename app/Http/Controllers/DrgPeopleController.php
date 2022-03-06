<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrgPeopleRequest;
use App\Models\DrgPeople;
use Illuminate\Http\Request;

class DrgPeopleController extends Controller
{
    public function index()
    {
        return view('pages.drg-people.index');

    }

    public function create()
    {
        //
    }

    public function store(StoreDrgPeopleRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated['photo'])) {
            $randomize = time().rand(111111, 999999);
            $extension = $validated['photo']->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $image = $validated['photo']->move('images/drg/', $filename);
            $validated['photo'] = $image;
        }

        if (isset($validated['phones'])) {
            $validated['phones'] = json_encode($validated['phones']);
        }
        DrgPeople::create($validated);
        return redirect()->back()->with(['status' => true]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
