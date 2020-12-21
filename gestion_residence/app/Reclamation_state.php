<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation_state extends Model
{
    protected $table ='reclamation_states';
    public $primaryKey = 'id_reclamation_state';
    public $timestamps = true;

    protected $fillable = [
        'id_reclamation_state',
        'name_reclamation_state',
        'created_at',
        'updated_at'
    ];

    public function reclamations()
    {
        return $this->belongsToMany('App\Reclamation','reclamation_states_reclamations','id_reclamation_state','id_reclamation')->withTimestamps();;
    }
}
