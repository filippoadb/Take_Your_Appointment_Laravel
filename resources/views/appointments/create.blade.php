<x-layout>
<form method="POST" action="{{route('appointments.store')}}" enctype="multipart/form-data">
@csrf
<div class="background">
  <div class="container1">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title body1">
            <span>PRENOTA</span>
            <span>IL TUO</span>
            <span>APPUNTAMENTO</span>
          </div>
          <div class="app-contact body1">CONTATTACI : +39 384 374 9482</div>
        </div>
        <div class="screen-body-item body1">
          <div class="app-form">
            <div class="app-form-group">
              <input class="app-form-control body1" placeholder="NAME" value="{{Auth::user()->name}}">
            </div>
            <div class="app-form-group">
                @error('datetime')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              <input class="app-form-control body1" type="datetime-local" name="datetime" placeholder="Data e ora">
            </div>
            <div class="app-form-group message">
                @error('notes')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              <input class="app-form-control body1" name="notes" placeholder="Aggiungi una nota"></input>
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button" type="reset">CANCELLA</button>
              <button class="app-form-button" type="submit">PRENOTA ORA</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</x-layout>