<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'category';

    protected $table = self::TABLE_NAME;

    public $incrementing = false;

    protected $keyType = 'string';
}
