@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">{{ __('Login') }}</div>

				<div class="card-body">
					@if (count($errors) > 0  && Session::get('last_auth_attempt') == 'login')
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="login-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>

								@if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">{{ __('Register') }}</div>

				<div class="card-body">
					@if (count($errors) > 0 && Session::get('last_auth_attempt') == 'register')
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif


					<form method="POST" action="{{ route('register') }}">
						@csrf
						<div class="form-row">
							<div class="col form-group">
								<label>First name </label>   
								<input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
							</div> <!-- form-group end.// -->
							<div class="col form-group">
								<label>Last name</label>
								<input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
							</div> <!-- form-group end.// -->
						</div> <!-- form-row end.// -->
						<div class="form-group">
							<label>Email address</label>
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
							<small class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div> <!-- form-group end.// -->
						
						<div class="form-group">
							<label>Gender</label><br>
							<label class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" value="male" {{ old('gender')=="male" ? 'checked='.'"checked"' : '' }}>
								<span class="form-check-label"> Male </span>
							</label>
							<label class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" value="female" {{ old('gender')=="female" ? 'checked='.'"checked"' : '' }}>
								<span class="form-check-label"> Female</span>
							</label>
						</div> <!-- form-group end.// -->
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>City</label>
								<input id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" type="text" class="form-control" value="{{ old('city') }}" required autofocus>
							</div> <!-- form-group end.// -->
							<div class="form-group col-md-6">
								<label>Country</label>
								<select id="country" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" >
									<option value=""> Choose...</option>
									@foreach(json_decode($countries) as $country)
										@if (old('country') == $country)
										      <option value="{{ $country }}" selected>{{ $country }}</option>
										@else
										      <option value="{{ $country }}">{{ $country }}</option>
										@endif
									@endforeach
								</select>
							</div> <!-- form-group end.// -->
						</div> <!-- form-row.// -->
						<div class="form-group">
							<label>Password</label>
							<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
						</div> <!-- form-group end.// -->  
						<div class="form-group">
							<label>Confirm Password</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						</div> <!-- form-group end.// -->  


						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block"> Register  </button>
						</div> <!-- form-group// -->      
						<small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')

@endsection
