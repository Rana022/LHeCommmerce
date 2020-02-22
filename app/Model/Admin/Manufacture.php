<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = [
      'manufacture_name', 'manufacture_status',
  ];
      protected $table = 'tbl_manufacture';
}
