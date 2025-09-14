<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 */
class JobSaved extends Model
{
    use HasFactory;

    protected $table = 'jobsaved';

    protected $fillable = [
        'job_id',
        'user_id',
        'imagen',
        'titulo_trabajo',
        'region_trabajo',
        'tipo_trabajo',
        'empresa',
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
