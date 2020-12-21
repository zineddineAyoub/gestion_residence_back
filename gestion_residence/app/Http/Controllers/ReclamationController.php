<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamation;
use PDF;
class ReclamationController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api', ['except' => ['store','show','pdf']]);
    }


    function store(Request $request)
    {
        
        $reclaimer =  (new ReclaimerController)->store($request);
        
        $request['id_reclaimer']=$reclaimer['id_reclaimer'];
       
        $reclamation = Reclamation::create($request->all());
        // ID ATTENTE IS 1
        $reclamation->reclamation_states()->attach(1);
        if($request->all()["availabilities"])
        {
            foreach ($request->all()["availabilities"] as $key) {
                $reclamation->availabilities()->attach($key,['horaire'=>$request->all()["horaire"]]);
               }
        }
        

        return $reclamation;
    }

    function attachState(Request $request)
    {
        $reclamation = Reclamation::where('id_reclamation',$request->all()["id_reclamation"])->get()->first();
       // return $reclamation;
       $reclamation->reclamation_states()->attach($request->all()['id_reclamation_state']);
       
       // $reclamation->reclamation_states()->attach($request->all()["id_reclamation_state"]);
       
        
       $reclamation =  $reclamation::with('reclamation_states')->where('id_reclamation',$request->all()["id_reclamation"])->first()["reclamation_states"];//->orderby('id_reclamation_state')->get();
         
         return $reclamation->sortbyDesc('pivot.created_at')->first();

    }

    function index()
    {
        return Reclamation::with(['reclaimer','reclamation_states'=>function($query){
            $query->orderbyDesc('pivot_created_at');
        },'reclamation_type','availabilities'])->orderbyDesc('created_at')->get();
    }

    function show($id)
    {
        return  $reclamation = Reclamation::with(['reclaimer','reclamation_states'=>function($query){
            $query->orderby('pivot_created_at');
        },'reclamation_type','availabilities'])->where('code_reclamation',$id)->get()->first();
        
    }

    function delete(Reclamation $reclamation)
    {
        $reclamation->reclamation_states()->detach();
        $reclamation->availabilities()->detach();
        $reclamation->delete();  
         return "Deleted ! ";
    }

    function generate_pdf($id)
    {
        $reclamation = $this->show($id);
        
       $output ='
        <style>
        h2{ color : #283048}
        </style>
       <div> 
       <h2 style="text-align: center;">Fiche Réclamation :'. $reclamation->code_reclamation.' </h2>  
       <hr> 
       <h2> Information Personnel </h2>
        <p> <b>Nom Prenom : </b>'.$reclamation->reclaimer->first_name_reclaimer.' '.$reclamation->reclaimer->last_name_reclaimer.'
        <p> <b>Adresse : </b>'.$reclamation->reclaimer->address_reclaimer.'
        <p> <b>Numero Telephone : </b>'.$reclamation->reclaimer->phone_number_reclaimer.'
        <p> <b>Email : </b>'.$reclamation->reclaimer->email_reclaimer.'
        <hr>
        <h2> Detail Reclamation </h2>
        <p> <b>Code Reclamation</b> : '.$reclamation->code_reclamation.'
        <p> <b>Type Reclamation</b> : '.$reclamation->reclamation_type->name_reclamation_type.'
        <p> <b>Description</b> : '.$reclamation->description.'
        <hr>
        <h2> Suivie Reclamation </h2>
        ';
        foreach ($reclamation->reclamation_states as $state ) {
           $output .=
           '
           <div>
           <p> <b>Etat</b> : '.$state->name_reclamation_state.' </p>
            <p> <b>Date</b> : '.$state->pivot->created_at.'</p> 
            </div>';
        }

        '
        </div>
       
       
       ';
        return $output;
    }

    function pdf($id)
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->generate_pdf($id));
     return $pdf->download('Reclamation_'.$id.'.pdf');
    }
    
}
