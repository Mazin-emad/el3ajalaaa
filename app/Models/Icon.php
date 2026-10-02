<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Icon extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'category',
        'icon_url',
    ];
}
