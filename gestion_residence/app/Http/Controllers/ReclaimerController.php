<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclaimer;

class ReclaimerController extends Controller
{
    function store(Request $request)
    {
       // $reclaimer = Reclaimer::create($request->all());
        $reclaimer = Reclaimer::firstOrCreate(
            ['email_reclaimer'=>$request->all()["email_reclaimer"]],
            $request->all()
        );
        return $reclaimer;
    }

    function index()
    {
        return Reclaimer::all();
    }
}
