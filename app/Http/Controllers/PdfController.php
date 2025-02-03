<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function downloadPDF()
    {
        $members = Member::all(); // Get all member data
        $pdf = Pdf::loadView('pdf.members', compact('members')); // Load view with member data

        return $pdf->download('members.pdf'); // Download the PDF
    }
}
