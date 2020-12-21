<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation_type extends Model
{
    protected $table ='reclamation_types';
    public $primaryKey = 'id_reclamation_type';
    public $timestamps = true;

    protected $fillable = [
        'id_reclamation_state',
        'name_reclamation_type',
        'created_at',
        'updated_at'
    ];

    public function reclamations()
    {
        return $this->hasMany('App\Reclamation');
    }
}
