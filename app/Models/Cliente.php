<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome','email','telefone','sexo','cidade_id'];

    /**
     * Pega a cidade conforme a cidade_id
     */
    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
