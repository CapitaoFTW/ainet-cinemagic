<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use SoftDeletes;

class Lugar extends Model
{	
    use HasFactory;
	
	protected $table = "Lugares";
    public $timestamps = false;

    protected $fillable = [
        'sala_id',
        'fila',
        'posicao',
    ];

}
