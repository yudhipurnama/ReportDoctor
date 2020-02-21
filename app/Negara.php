<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $table = 'tbl_negara';

    protected $fillable = ['nama_negara'];
}
