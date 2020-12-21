<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Availability;
class AvailabilityController extends Controller
{

    function index()
    {
        return Availability::all();
    }

}
