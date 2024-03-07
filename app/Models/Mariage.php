<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mariage extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_mariage',
        'candidat_id',
        'marier_id',
    ];

    protected $casts = [
        'date_mariage' => 'datetime:Y-m-d',
    ];

    public function candidat(): BelongsTo
    {
        return $this->belongsTo(Candidat::class);
    }

    public function marier(): BelongsTo
    {
        return $this->belongsTo(Candidat::class, 'marier_id');
    }
}
