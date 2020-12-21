<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclaimer extends Model
{
    protected $table ='reclaimers';
    public $primaryKey = 'id_reclaimer';
    public $timestamps = true;

    protected $fillable = [
        'id_reclaimer',
        'first_name_reclaimer',
        'last_name_reclaimer',
        'email_reclaimer',
        'address_reclaimer',
        'phone_number_reclaimer',
        'longitude',
        'latitude',
        'created_at',
        'updated_at'
    ];

    public function reclamations()
    {
        return $this->hasMany('App\Reclamation');
    }
}
