<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = [
        "id",
        "titulo_trabajo",
        "region_trabajo",
        "empresa",
        "tipo_trabajo",
        "vacante",
        "experiencia",
        "salario",
        "genero",
        "responsabilidades",
        'descripcion_trabajo',
        "educacion_experiencia",
        "otrosbeneficios",
        "imagen",
        "categoria",
        "created_at",
        "updated_at",
    ];

    public $timestamps = true;

}
