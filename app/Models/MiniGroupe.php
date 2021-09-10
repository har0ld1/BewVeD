<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiniGroupe extends Model
{
    use HasFactory;

    protected $table = 'minigroupes';

    public $timestamps  = null;
    protected $primaryKey = 'id';
    protected $created_at = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sessionid',
    ];
}
