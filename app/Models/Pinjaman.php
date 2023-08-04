<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Angsuran;
use App\Models\JenisPinjaman;
use App\Models\DetailPinjaman;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = "pinjaman";

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }

    public function jenispinjaman(): BelongsTo
    {
        return $this->belongsTo(JenisPinjaman::class);
    }

    public function angsuran(): HasMany
    {
        return $this->hasMany(Angsuran::class);
    }

    public function detailpinjaman(): HasOne
    {
        return $this->hasOne(DetailPinjaman::class);
    }
}
