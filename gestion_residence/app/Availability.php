<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    //
    protected $table ='availabilities';
    public $primaryKey = 'id_availability';
    public $timestamps = true;

    protected $fillable = [
        'id_availability',
        'day_availability',
        'horaire',
        'created_at',
        'updated_at'
    ];

    public function reclamations()
    {
        return $this->belongsToMany('App\Reclamation','availability_reclamation','id_availability','id_reclamation');
    }
}
