<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBerkas extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_berkas';
    public $timestamps = false;
}
