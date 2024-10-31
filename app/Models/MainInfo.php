<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'description',
        'image',
        'provider',
        'cv',
        'birthday',
        'contact_number',
        'email',
        'location',
        'user_id',
    ];

    public function user()  {
        return $this->belongsTo(User::class);
    }

}
