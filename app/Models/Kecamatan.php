<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function desas(): HasMany
    {
        return $this->hasMany(Desa::class);
    }

    public function camats(): HasMany
    {
        return $this->hasMany(Camat::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, 'usable');
    }
}
