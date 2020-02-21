<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $table = 'monitorings';

    protected $fillable = array(
        'user_id', 'nama', 'waktu', 'tgl', 'moderator_mr', 'keterangan'
    );
}
