<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aktivitas extends Model
{
    protected $table = 'aktivitas';
    protected $fillable = ['nama_aktivitas', 'deskripsi', 'tanggal', 'status'];
}
