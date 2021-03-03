<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'student_id',	'first_name',	'last_name',	'major_id',	'address'

    ];

}
