<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;

    protected $table = 'durations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
