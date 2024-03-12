<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    // Azione per visualizzare la lista degli appuntamenti
    public function index()
    {
        $appointments = auth()->user()->appointments;
        return view('appointments.index', compact('appointments'));
    }
    
    //Per visualizzare il form di creazione
        public function create()
        {
            return view('appointments.create');
        }

    public function store(Request $request)
    {

    // Definisco le regole di validazione
    $rules = [
        'datetime'=> 'required|date|after:now',
        'notes'=>'nullable|string',
    ];

    // Definisco i messaggi di errore personalizzati
    $messages = [
        'datetime.required' => 'Il campo Data e Ora è obbligatorio.',
        'datetime.date' => 'Il campo Data e Ora deve essere una data valida.',
        'datetime.after' => 'Il campo Data e Ora deve essere maggiore di quella attuale.',
    ];

    $validatedData = $request->validate($rules, $messages);

    // $request->validate([
    //     'datetime' => 'required|date',
    //     'notes' => 'nullable|string',
    // ]);

    // Creazione di un nuovo appuntamento associato all'utente autenticato
        auth()->user()->appointments()->create([
            'datetime' => $validatedData['datetime'],
            'notes' => $validatedData['notes'],
        ]);

    return redirect()->route('welcome')->with('success', 'Appuntamento creato con successo!');
    }

    // public function userAppointments()
    // {
    //     $user = Auth::user();
    //     $appointments = $user->appointments;

    //     return view('appointments.index', compact('appointments'));
    // }
}
