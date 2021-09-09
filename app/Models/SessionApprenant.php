<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionApprenant extends Model
{
    use HasFactory;
    protected $table = 'sessionapprenant';
    public $timestamps  = null;
    protected $created_at = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'idSession',
        'idApprenant',
    ];
}
