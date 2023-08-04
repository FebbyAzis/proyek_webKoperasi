<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SHUAnggota extends Model
{
    use HasFactory;
    protected $table = "shuanggota";

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
