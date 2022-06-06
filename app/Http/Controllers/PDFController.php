<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class PDFController extends Controller
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

    public function generate_pdf()
    {

        $getDate = Carbon::now('America/Los_Angeles')->format('Y-m-d H:i');

        $data = [
          'title' => 'First PDF for Coding Driver',
          'type' => 'Invoice',
          'date' => $getDate,
          'ownerBusinessName' => 'UAB Garazh',
          'ownerBusinessAddress' => 'Kalabybyskiu 17',
          'ownerTaxID' => 'Number One',
          'ownerBankInformation' => 'LT17706040253594582',
          'ownerBankName' => 'Bank of Kusys',
          'customerBusinessName' => 'UAB Kiausiniai',
          'customerBusinessAddress' => 'Vejo g. 77, LT-41422',
          'customerBusinessCity' => 'City of Nahui',
          'customerTaxID' => 'None',
          'customerBankInformation' => 'PVM KODAS: Nupustas',
          'content' => 'regarding nothing.'        
        ];
        
        $pdf = PDF::loadView('generate_pdf', $data);
  
        return $pdf->download('codingdriver.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
