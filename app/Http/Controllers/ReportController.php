<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\MorningReport;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function morningReport()
    {
        $data = MorningReport::orderBy('id', 'desc')->paginate(100);
        return view('frontend.morning_report', [
            'data'      => $data,
            'title'     => 'Morning Report',
            'subtitle'  => 'Data Morning Report'
        ]);
    }

    public function simpan_morningReport(Request $request)
    {
        $report = new MorningReport;
        $report->user_id = auth()->user()->id;
        $report->nama = $request->nama;
        $report->waktu = $request->waktu;
        $report->tgl = $request->tgl;
        $report->moderator_mr = $request->moderator_mr;
        $report->keterangan = $request->keterangan;
        $report->save();
        // dd($report);

        return redirect()->route('morning-report')->with('sukses', 'Data berhasil di input');
    }
}
