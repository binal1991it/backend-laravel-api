<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Savesearch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'userId',
        'search_name',
        'category',
        'source',
        'keyword',
        'date',
        'created_by',
        'updated_by',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'savesearches';
}
