<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Satuan;
use Illuminate\Support\Facades\Validator;
use Dompdf\Dompdf;
use Dompdf\Options;

class SatuanController extends Controller
{
    // add constructor for persmission admin
    public function __construct()
    {
        $this->middleware('permission:satuan');
    }

    //add report function with request parameter
    public function report(Request $request)
    {
        $satuan = Satuan::all();
        $totalSatuan = count($satuan);

        return view('admin.satuan.report', compact('satuan', 'totalSatuan'));
    }

    //add index function with request parameter
    public function index(Request $request)
    {
        $satuan = Satuan::all();
        $totalSatuan = count($satuan);

        return view('admin.satuan.index', compact('satuan', 'totalSatuan'));
    }

    //Show the form for creating a new resource.
    public function create()
    {
        return view('admin.satuan.create');
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $data['created_by'] = auth()->user()->id ?? '1';
        $data['updated_by'] = auth()->user()->id ?? '1';
        $satuan = Satuan::create($data);

        // add redirect to route admin.satuan.index
        return response()->json([
            'message' => __('Satuan berhasil ditambahkan'),
            'redirect' => route('admin.satuan.index')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find satuan by id
        $satuan = Satuan::findOrFail($id);
        return view('admin.satuan.edit', compact('satuan'));
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // add variable satuan with value from Satuan model find or fail
        $data = $request->all();
        $validator = Validator::make($data, [
            'id' => 'required,exists:tblsatuan,id',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $satuan = Satuan::findOrFail($id);

        $data['updated_by'] = auth()->user()->id ?? '1';
        $satuan->update($data);

        // add redirect to route admin.satuan.index
        return response()->json([
            'message' => __('Satuan berhasil diubah'),
            'redirect' => route('admin.satuan.index')
        ]);
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        // add variable satuan with value from Satuan model find or fail
        $satuan = Satuan::findOrFail($id);
        // add variable satuan with value from Satuan model delete
        $satuan->delete();
        // add redirect to route admin.satuan.index
        return response()->json([
            'message' => __('Satuan berhasil dihapus'),
            'redirect' => route('admin.satuan.index')
        ]);
    }

    public function print(Request $request)
    {
        $satuan = Satuan::all();
        $totalSatuan = count($satuan);
        // return view('admin.satuan.print', compact('satuan', 'totalSatuan'));

        // Create a PDF instance
        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isPhpEnabled', true);
        $pdf = new Dompdf($pdfOptions);
        // Load HTML content from the Blade view
        $content = view('admin.satuan.print', compact('satuan', 'totalSatuan'))->render();
        $pdf->loadHtml($content);
        // Set paper size (optional)
        $pdf->setPaper('A4');
        // Render PDF (first pass to get the total number of pages)
        $pdf->render();
        // Stream the file to the browser
        $pdf->stream("Laporan Satuan.pdf", ['Attachment' => 0]);
    }
}
