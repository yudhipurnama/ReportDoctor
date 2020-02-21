<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'tbl_provinsi';

    protected $fillable = ['negara_id','nama_provinsi'];
}
