<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Users;
use App\Models\JenisSimpanan;
use App\Models\Penarikan;
use App\Models\DetailSimpanan;

class Simpanan extends Model
{
    use HasFactory;
    Protected $table = "simpanan";

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }

    public function jenissimpanan(): BelongsTo
    {
        return $this->belongsTo(JenisSimpanan::class);
    }

    public function penarikan(): HasOne
    {
        return $this->hasOne(Penarikan::class);
    }

    public function detailsimpanan(): HasOne
    {
        return $this->hasOne(DetailSimpanan::class);
    }
}
