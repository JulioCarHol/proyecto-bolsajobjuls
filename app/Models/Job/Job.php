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
        'titulo_trabajo',
        'region_trabajo',
        'empresa',
        'tipo_trabajo',
        'vacante',
        'experiencia',
        'salario',
        'genero',
        'responsabilidades',
        'descripcion_trabajo',
        'educacion_experiencia',
        'otrosbeneficios',
        'imagen',
        'categoria',
    ];

    public $timestamps = true;

    protected $casts = [
        'vacante' => 'boolean',
    ];

    // Relaciones
    public function category()
    {
        return $this->belongsTo(\App\Models\Category\Category::class, 'categoria');
    }

    public function applications()
    {
        return $this->hasMany(\App\Models\Job\Application::class);
    }

    public function savedByUsers()
    {
        return $this->hasMany(\App\Models\Job\JobSaved::class);
    }

}
