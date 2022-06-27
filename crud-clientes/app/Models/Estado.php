<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = ['nome','pais_id'];

    /**
     * Pega o país conforme o pais_id
     */
    public function pais()
    {
        return $this->belongsTo(Paise::class);
    }
}
