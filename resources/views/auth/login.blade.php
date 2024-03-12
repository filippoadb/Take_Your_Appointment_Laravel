<x-layout>
<div class="authentic">
<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST" action="{{route('register')}}">
                    @csrf
					<label for="chk" aria-hidden="true">Registrati</label>
					<input type="text" name="name" placeholder="Nome">
					<input type="email" name="email" placeholder="Email">
					<input type="password" name="password" placeholder="Password">
                    <input type="password" name="password_confirmation" placeholder="Conferma password">
					<button type="submit">Registrati</button>
				</form>
			</div>

			<div class="login">
				<form method="POST" action="{{route('login')}}">
                    @csrf
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email">
					<input type="password" name="password" placeholder="Password">
					<button type="submit">Login</button>
				</form>
			</div>
	</div>
    </div>
</x-layout>