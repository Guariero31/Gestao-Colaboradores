<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Observacoes extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'anotacao',
        'usuario',
        'data_hora',
    ];
    
    public function cargo() {
        return $this -> belongsTo(Cargo::class);
    }
}
