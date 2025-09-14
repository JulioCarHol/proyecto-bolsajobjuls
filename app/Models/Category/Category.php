<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'nombre',
    ];

    public $timestamps = true;

    // Relaciones
    public function jobs()
    {
        return $this->hasMany(\App\Models\Job\Job::class, 'categoria');
    }
}
