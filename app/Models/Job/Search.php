<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Search extends Model
{
    use HasFactory;


    protected $table = 'searches';

    protected $fillable = [
        'keyword'
    ];

    public $timestamps = true;


}
