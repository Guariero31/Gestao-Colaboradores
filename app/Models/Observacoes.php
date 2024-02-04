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
        'pessoa_id',
    ];
}