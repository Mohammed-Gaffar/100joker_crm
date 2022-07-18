<?php

namespace App\Http\Controllers;

use App\pdffiles;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PdffilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pdffiles  $pdffiles
     * @return \Illuminate\Http\Response
     */
    public function show(pdffiles $pdffiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pdffiles  $pdffiles
     * @return \Illuminate\Http\Response
     */
    public function edit(pdffiles $pdffiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pdffiles  $pdffiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pdffiles $pdffiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pdffiles  $pdffiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(pdffiles $pdffiles)
    {
        //
    }

    /** function for generatepdf files  */
    public function generatePDF(){

        $company_data = \App\company_profiles::where('id','=','1')->first();

        $customPaper = array(0,0,720,840);
        Pdf::setOption(['debugCss' => 'True']);
        $pdf = PDF::loadView('PDF.invt', compact('company_data'))->setPaper($customPaper);

        $pdf->save('quotations/inv1111111111.pdf');

        return $pdf->download('abra_kdabra.pdf');


    }



}
