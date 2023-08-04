<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;
use App\Models\Simpanan;
use App\Models\JasaAnggota;
use App\Models\SHUAnggota;
use App\Models\Pinjaman;
use App\Models\Angsuran;
use App\Models\Penarikan;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Users extends Model
{
    use HasFactory;
    
    protected $table = 'users';

    public function anggota(): HasOne
    {
        return $this->hasOne(Anggota::class);
    }

    public function simpanan(): HasMany
    {
        return $this->hasMany(Simpanan::class);
    }

    public function jasaanggota(): HasOne
    {
        return $this->hasOne(JasaAnggota::class);
    }

    public function shuanggota(): HasOne
    {
        return $this->hasOne(SHUAnggota::class);
    }

    public function pinjaman(): HasMany
    {
        return $this->hasMany(Pinjaman::class);
    }

    public function penarikan(): HasMany
    {
        return $this->hasMany(Penarikan::class);
    }

   

}
