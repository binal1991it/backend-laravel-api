<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sources extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'Sources_name',
        'api_key',
        'Url',
        'created_by',
        'updated_by',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'Sources';

}
