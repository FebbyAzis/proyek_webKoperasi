<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanAll extends Model
{
    use HasFactory;
    protected $table = "laporan";

    public function user(): BelongTo
    {
        return $this->belongsTo(Users::class);
    }
}

