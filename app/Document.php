<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        	'last_document',
            'photo',
            'name',
            'lastname',
            'birthdate',
            'address',
            'telephone',
            'department',
            'municipality',
            'status',
            'user_id',
            'password',
    ];
}


      		