<?php

namespace App\Http\Controllers;

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
        return $pdf->download($user->username . '.pdf');
    }
}
