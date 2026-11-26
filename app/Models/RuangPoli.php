<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangPoli extends Model
{
    use HasFactory;

    protected $table = 'ruang_polis';
    
    protected $fillable = ['nama_poli', 'lokasi_gedung', 'alat_medis'];
}