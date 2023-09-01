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
        "id",
        "cv",
        "email",
        "user_id",
        "job_id",
        "imagen",
        "titulo_trabajo",
        "region_trabajo",
        "empresa",
        "tipo_trabajo",
        "created_at",
        "updated_at"

    ];

    public $timestamps = true;

}
