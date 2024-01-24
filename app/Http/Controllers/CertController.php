<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class CertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generatePDF()
    {

        $data = [
            'title' => 'Certificate',
            'content' => 'Ovo je primer generisanja PDF fajla u Laravel-u.',
        ];

        $pdf = PDF::loadView('pdf.view', $data);

        // Opciono: Postavite putanju gde želite sačuvati PDF fajl
        // $pdf->save(storage_path('app/pdf_output/filename.pdf'));

        // Opciono: Vraćanje PDF kao odgovora na zahtev
        $response = response($pdf->output())
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="filename.pdf"');

        return $response;
    }

}
