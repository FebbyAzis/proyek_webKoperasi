<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pinjaman;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JenisPinjaman extends Model
{
    use HasFactory;
    protected $table = "jenispinjaman";

    public function pinjaman(): HasOne
    {
        return $this->hasOne(Pinjaman::class);
    }
}
