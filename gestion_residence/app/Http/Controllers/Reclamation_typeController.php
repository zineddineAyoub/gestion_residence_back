<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamation_type;

class Reclamation_typeController extends Controller
{
    function store(Request $request)
    {
        $reclamation_type = Reclamation_type::create($request->all());
        return $reclamation_type;
    }

    function index()
    {
        return Reclamation_type::all();
    }
}
