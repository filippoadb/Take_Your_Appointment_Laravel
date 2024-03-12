<x-layout>
    <div class="container">
        <div class="row text-center mt-5">
            <div class="col-12">
                <h2 class="display-5 text-light">Appuntamenti in corso</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-6">
                <table id="customers">
                @if ($appointments->isEmpty())    

                    <p class="display-5 text-light fw-bold text-center mt-5">Non ci sono appuntamenti prenotati.</p>
                @else
                <tr>
                    <th>Nome e cognome</th>
                    <th>Data e ora</th>
                    <th>Note</th>
                </tr>
                
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ Auth::user()->name }}</td>
                        <td>{{ $appointment->datetime }}</td>
                        <td>{{ $appointment->notes }}</td>
                    </tr>
                    @endforeach    
                    @endif
                </table>
            </div>
        </div>
    </div>

    
</x-layout>