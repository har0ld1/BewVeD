<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;

    protected $table = 'apprenant';
    public $timestamps  = null;
    protected $created_at = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'gender',
        'age',
    ];
}
