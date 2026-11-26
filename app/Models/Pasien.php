<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
   
    protected $table = 'pasien';

  
    protected $primaryKey = 'Nomor_Rekam_Medis';
    public $incrementing = false;
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'Nomor_Rekam_Medis',
        'Profil_Pasien',
        'Kontak_Darurat_Pasien',
        'Domisili_Pasien',
    ];
}
