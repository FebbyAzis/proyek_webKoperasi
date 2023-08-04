<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Simpanan;
use App\Models\Users;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penarikan extends Model
{
    use HasFactory;
    protected $table = "penarikan";

    public function simpanan(): BelongsTo
    {
        return $this->belongsTo(Simpanan::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
