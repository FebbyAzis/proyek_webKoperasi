<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pinjaman;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPinjaman extends Model
{
    use HasFactory;
    protected $table = "detailpinjaman";

    public function pinjaman(): BelongsTo
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
