<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'candidat_id',
    ];

    public function candidat(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Candidat::class);
    }
}
