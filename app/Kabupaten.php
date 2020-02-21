<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'tbl_kabupaten';

    protected $fillable = ['provinsi_id','nama_kabupaten'];
}
