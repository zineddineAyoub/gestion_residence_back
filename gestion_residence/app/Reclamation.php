<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $table ='reclamations';
    public $primaryKey = 'id_reclamation';
    public $timestamps = true;

    protected $fillable = [
        'id_reclamation',
        'description',
        'code_reclamation',
        'created_at',
        'updated_at',
        'id_reclaimer',
        'id_reclamation_type'
    ];

    public function reclaimer()
    {
        return $this->belongsTo('App\Reclaimer','id_reclaimer');
    }

    public function reclamation_type()
    {
        return $this->belongsTo('App\Reclamation_type','id_reclamation_type');
    }

    public function reclamation_states()
    {
        return $this->belongsToMany('App\Reclamation_state','reclamation_states_reclamations','id_reclamation','id_reclamation_state')->withTimestamps()->withPivot('id_reclamation_states_reclamations');   
    }

    public function availabilities()
    {
        return $this->belongsToMany('App\Availability','availability_reclamation','id_reclamation','id_availability')->withTimestamps()->withPivot('horaire');  
    }



}
