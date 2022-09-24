<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPembayaran extends Model
{
    use HasFactory;
    protected $table = 'tbl_pembayaran';
    public $timestamps = false;
}
