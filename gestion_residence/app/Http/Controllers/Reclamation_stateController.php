<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamation_state;
use App\Reclamation;

class Reclamation_stateController extends Controller
{
    
    function store(Request $request)
    {
        $reclamation_state = Reclamation_state::create($request->all());
        return $reclamation_state;
    }

    function index()
    {
        return Reclamation_state::orderBy('id_reclamation_state')->get();
    }

   
}
