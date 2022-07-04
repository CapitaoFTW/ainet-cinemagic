<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use SoftDeletes;

class Genero extends Model
{
    use HasFactory;

	protected $primaryKey = "code";
	protected $keyType = "string";
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
        'nome',
    ];

    public function filmes()
    {
        return $this->hasMany(Filme::class, 'genero_code');
    }
}
