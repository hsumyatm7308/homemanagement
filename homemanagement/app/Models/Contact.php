<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "contacts";
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'number',
        'birthday_id',
        'status_id',
        'relative_id',
        'user_id'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function relative()
    {
        return $this->belongsTo(Relative::class);
    }
}
