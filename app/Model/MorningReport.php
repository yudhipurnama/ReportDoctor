<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class MorningReport extends Model
{
    protected $table = 'morning_reports';

    protected $fillable = array(
        'user_id', 'nama_dokter', 'tgl', 'waktu', 'moderator_mr', 'keterangan'
    );
}
