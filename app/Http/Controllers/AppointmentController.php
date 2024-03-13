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
        'datetime'=> 'required|date|after:now|before_or_equal:2024-12-31',
        'notes'=>'nullable|string|max:30',
    ];

    // Definisco i messaggi di errore personalizzati
    $messages = [
        'datetime.required' => 'Il campo Data e Ora è obbligatorio.',
        'datetime.date' => 'Il campo Data e Ora deve essere una data valida.',
        'datetime.after' => 'Il campo Data e Ora deve essere maggiore di quella attuale.',
        'datetime.before_or_equal' => 'Il campo Data e Ora deve essere impostato massimo al 31 Dicembre 2024',
        'notes.max' => 'Nel campo Note puoi scrivere massimo 30 caratteri',
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
