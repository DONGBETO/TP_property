<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPicture
 */
class Picture extends Model
{
    use HasFactory;

    protected $fillable = ['image'];
}
