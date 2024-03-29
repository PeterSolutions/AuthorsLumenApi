<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'country',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     * comentamos el $hidden ya que no aplica para autores
     */
    // protected $hidden = [
    //     'password',
    // ];
}
