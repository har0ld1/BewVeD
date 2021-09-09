<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprenantCompetence extends Model
{
    use HasFactory;

    protected $table = 'apprenant_competence';
    public $timestamps = null;
    protected $created_at = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'apprenant_id',
        'competence_id',
    ];
}
