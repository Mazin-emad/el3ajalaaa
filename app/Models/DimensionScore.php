<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class DimensionScore extends Model
{
    use HasUuids;

    protected $fillable = ['result_id', 'dimension_id', 'score', 'max_score', 'level'];

    public function result()
    {
        return $this->belongsTo(Result::class);
    }

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
