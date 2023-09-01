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
        "id",
        "job_id",
        "user_id",
        "imagen",
        "titulo_trabajo",
        "region_trabajo",
        "tipo_trabajo",
        "empresa",
        "created_at",
        "updated_at"

    ];

    public $timestamps = true;

}
