<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'autor', 'editorial', 'precio', 'anio_publicacion', 'isbn', 'paginas', 'sinopsis', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generos()
    {
        return $this->belongsToMany(Genero::class);
    }
}
