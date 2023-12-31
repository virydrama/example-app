<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropzone extends Model
{
    use HasFactory;

    protected $table = "archivos";
    protected $dateFormat = 'Y-m-d H:i:s';
}
