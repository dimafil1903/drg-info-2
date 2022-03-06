<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrgCarRequest;
use App\Models\DrgCar;
use Illuminate\Http\Request;

class DrgCarsController extends Controller
{
    public function index()
    {
        return view('pages.drg-cars.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreDrgCarRequest $request)
    {
        $validated = $request->validated();
        $validated['number'] = $validated['left_letters'] . $validated['number'] . $validated['right_letters'];

        if (isset($validated['photo'])) {
            $randomize = time() . rand(111111, 999999);
            $extension = $validated['photo']->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $image = $validated['photo']->move('images/drg-cars/', $filename);
            $validated['photo'] = $image;
        }
        DrgCar::create($validated);


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
