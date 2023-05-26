<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoveBirdParent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'parents';

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'id',
        'title',
        'cage_no',
        'male_ring',
        'female_ring',
        'is_sold',
        'user_id',
    ];

    public function chicks()
    {
        return $this->hasMany(Chick::class, 'parent_id');
    }
}
