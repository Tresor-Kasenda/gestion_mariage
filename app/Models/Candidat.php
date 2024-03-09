<?php

namespace App\Models;

use App\Concers\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'prenon',
        'date_naissance',
        'id_carte_electeur',
        'photos',
        'commune_id',
        'user_id',
        'gender'
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'id_carte_electeur' => 'integer',
        'gender' => GenderEnum::class,
    ];

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mariage(): HasOne
    {
        return $this->hasOne(Mariage::class);
    }
}
