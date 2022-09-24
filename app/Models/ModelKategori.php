<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKategori extends Model
{
    use HasFactory;
    protected $table = 'tbl_kategori';
    public $timestamps = false;
}
