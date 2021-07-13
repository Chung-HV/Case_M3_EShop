<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Contracts\Service\ServiceSubscriberTrait;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    use SoftDeletes;
    protected $fillable = [
        'name',
        'parent_id',
        'slug'
    ];
}
