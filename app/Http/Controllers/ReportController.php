<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use \App\Model\MorningReport;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function morningReport(Request $request)
    {
        if ($request->ajax()) {

            $data = MorningReport::all();
           
            return Datatables::of($data)
                    ->addColumn('action', function($data){  
                        $btn = '<button onclick="btnUbah('.$data->id.')" name="btnUbah" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span></button>';
                        $delete = '<button onclick="btnDel('.$data->id.')" name="btnDel" type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>';
                        return $btn .'&nbsp'. $delete; 
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('frontend.morning_report', [
            'title'     => 'Morning Report',
            'subtitle'  => 'Data Morning Report'
        ]);
    }

    public function simpan_morningReport(Request $request)
    {
        $report = new MorningReport;
        $report->user_id = auth()->user()->id;
        $report->nama_dokter = $request->nama_dokter;
        $report->waktu = $request->waktu;
        $report->tgl = $request->tgl;
        $report->moderator_mr = $request->moderator_mr;
        $report->keterangan = $request->keterangan;
        $report->save();
        // dd($report);

        return redirect()->route('morningReport')->with('sukses', 'Data berhasil di input');
    }
}
