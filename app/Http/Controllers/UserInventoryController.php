<?php

namespace App\Http\Controllers;

use App\Models\UserInventory;
use Illuminate\Http\Request;

class UserInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UserInventory::orderByDesc('created_at')->get();
        return view("pages.user", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->ni);
        $validated = $request->validate([
            'nim' => "required",
            'username' => "required",
            'phone' => "required",
        ]);


        UserInventory::create($validated);

        return redirect("/user");
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInventory $userInventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserInventory $userInventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = UserInventory::findOrFail($id);

        $validated = $request->validate([
            'nim' => "required",
            'username' => "required",
            'phone' => "required",
        ]);

        $user->nim = $validated['nim'];
        $user->username = $validated['username'];
        $user->phone = $validated['phone'];
        $user->save();

        return redirect("/user");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        UserInventory::findOrFail($id)->delete();

        return redirect("/user");
    }
}
