<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonenumber extends Model
{
    use HasFactory;
    protected $table = 'phonenumbers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'number',
        'contact_id',
        'user_id'

    ];


    public function phonable()
    {
        return $this->morphTo();
    }


}
