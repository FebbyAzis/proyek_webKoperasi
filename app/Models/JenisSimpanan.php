<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Simpanan;

class JenisSimpanan extends Model
{
    use HasFactory;
    protected $table = "jenissimpanan";

    public function simpanan(): HasOne
    {
        return $this->hasOne(Simpanan::class);
    }
}
