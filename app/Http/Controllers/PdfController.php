<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\UserInventory;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index($id)
    {
        $user = UserInventory::findOrFail($id);


        // dd($user->username);

        $pdf = PDF::loadView("pages.pdf", compact('user'));
        return $pdf->download($user->name . '.pdf');
    }

    public function all()
    {
        $user = Inventory::orderByDesc('created_at')->get();


        $pdf = PDF::loadView("pages.presentPdf", compact("user"));
        return $pdf->download("Daftar Hadir Yudisium" . 'pdf');
    }
}
