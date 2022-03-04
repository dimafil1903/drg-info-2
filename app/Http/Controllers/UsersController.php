<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('pages.users.index', ['users' => User::paginate(20)]);

    }

    public function create()
    {
        //
    }

    public function store(StoreUserRequest $request)
    {

        $this->user->create($request->validated());
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
