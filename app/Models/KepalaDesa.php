<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KepalaDesa extends Model
{
    use HasFactory;

    protected $table = 'kepala_desa';

    protected $fillable = [
        'nik',
        'nama',
        'status',
        'tanggal_menjabat',
        'tanggal_demisioner',
        'alamat',
        'foto',
        'desa_id',
    ];

    protected $casts = [
        'tanggal_menjabat' => 'date',
        'tanggal_demisioner' => 'date',
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class);
    }
}
