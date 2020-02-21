<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\Monitoring;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function monitoring()
    {
        $data = Monitoring::orderBy('id', 'desc')->paginate(100);
        return view('frontend.monitoring', [
            'data'      => $data,
            'title'     => 'Monitoring',
            'subtitle'  => 'Hasil Monitoring'
        ]);
    }

    public function simpan_monitoring(Request $request)
    {
        $monitoring = new Monitoring;
        $monitoring->user_id = auth()->user()->id;
        $monitoring->nama = $request->nama;
        $monitoring->waktu = $request->waktu;
        $monitoring->tgl = $request->tgl;
        $monitoring->moderator_mr = $request->moderator_mr;
        $monitoring->keterangan = $request->keterangan;
        $monitoring->save();
        // dd($monitoring);

        return redirect()->route('monitoring')->with('sukses', 'Data berhasil di input');
    }
}
