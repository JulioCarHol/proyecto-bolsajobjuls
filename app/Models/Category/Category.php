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
        "id",
        "nombre",
        "created_at",
        "updated_at",

    ];

    public $timestamps = true;
}
