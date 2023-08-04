<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    use HasFactory;
    protected $table = "anggota";
	// protected $fillable = [
	// 	'namaanggota', 'simpananpokok', 'simpananwajib', 'simpananmanasuka', 'sisapinjamanpiutang',
    //      'sisapinjamansmtr', 'sisapinjamanreguler', 'jasahutangbarang', 'jasahutanguang', 'jasatotal',
    //       'shusimpanan', 'shuhutang', 'shutotal'
	// ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
   
}
