<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Define the table name if it's different from the pluralized version of the model name
    // protected $table = 'profiles';

    // Define the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'phone',
        'email',
        'street',
        'city',
        'state',
        'country',
        'profile_image',
    ];

    // You can also set the timestamp format, if necessary
    // protected $dateFormat = 'U';
}
