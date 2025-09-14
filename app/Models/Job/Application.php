<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 */
class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'cv',
        'email',
        'user_id',
        'job_id',
        'imagen',
        'titulo_trabajo',
        'region_trabajo',
        'empresa',
        'tipo_trabajo',
    ];

    public $timestamps = true;

    // Relaciones
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function job()
    {
        return $this->belongsTo(\App\Models\Job\Job::class);
    }

}
