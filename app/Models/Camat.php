<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Camat extends Model
{
    use HasFactory;

    protected $table = 'camat';

    protected $fillable = [
        'nip',
        'nama',
        'status',
        'tanggal_menjabat',
        'tanggal_demisioner',
        'alamat',
        'foto',
        'kecamatan_id',
    ];

    protected $casts = [
        'tanggal_menjabat' => 'date',
        'tanggal_demisioner' => 'date',
    ];

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
