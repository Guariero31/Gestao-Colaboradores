<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Observacoes extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'anotacao',
        'usuario',
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->Pessoa = Auth::user()->id;
        });
    }

    public function pessoa() {
        return $this -> belongsTo(Pessoa::class);
    }
}