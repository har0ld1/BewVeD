<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $table = 'competence';
    public $timestamps = null;
    protected $created_at = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'libelle'
    ];

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function apprenants()
    {
        return $this->belongsToMany(Apprenant::class);
    }
}
