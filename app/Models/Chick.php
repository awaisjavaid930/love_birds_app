<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chick extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'id',
        'parent_id',
        'title',
        'ring_no',
        'breed_no',
        'gender',
        'is_sold',
    ];

    public function parent()
    {
        return $this->belongsTo(LoveBirdParent::class);
    }
}
