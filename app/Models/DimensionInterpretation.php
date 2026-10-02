<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DimensionInterpretation extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'dimension_id',
        'level',
        'interpretation_text_ar',
        'high_threshold',
        'low_threshold',
    ];

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
