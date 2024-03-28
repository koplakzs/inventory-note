<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\UserInventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Inventory::orderByDesc('created_at')->get();
        return view('pages.home', compact('list'));
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
        $validate = $request->validate([
            'nim_user' => "required"
        ]);
        $user = UserInventory::where("nim", $validate['nim_user'])->first();

        if ($user) {
            $validate['username'] = $user->username;
            $validate['phone_user'] = $user->phone;

            Inventory::create($validate);

            return redirect("/");
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        $validated = $request->validate([
            'nim' => "required",

        ]);
        $user = UserInventory::where("nim", $validated['nim'])->first();
        if ($user) {
            $inventory->nim_user = $user->nim;
            $inventory->username = $user->username;
            $inventory->phone_user = $user->phone;
            $inventory->save();

            return redirect("/");
        }

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();

        return redirect("/");
    }
}
