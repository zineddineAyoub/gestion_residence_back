<?php

use Illuminate\Database\Seeder;
use App\Availability;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
        foreach($days as $day)
        {
            Availability::create([
                'day_availability'=> $day,
            ]);
        }
    }
}
