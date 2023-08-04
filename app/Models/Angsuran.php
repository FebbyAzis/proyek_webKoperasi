<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Pinjaman;

class Angsuran extends Model
{
    use HasFactory;
    protected $table = "angsuran";

    

    public function pinjaman(): BelongsTo
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
