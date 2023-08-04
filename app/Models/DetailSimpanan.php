<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Simpanan;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailSimpanan extends Model
{
    use HasFactory;
    protected $table = "detailSimpanan";

    public function simpanan(): BelongsTo
    {
        return $this->belongsTo(Simpanan::class);
    }
}
