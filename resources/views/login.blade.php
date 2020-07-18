
@extends('layouts/app')

@section('content')
	<div class="contact1">
			<form class="contact1-form validate-form" action="{{route('contact_login')}}" method="POST">
				<span class="contact1-form-title">
					Login
				</span>
                <span class="error">
                    @if(Session::has('login_err'))
                        {{ Session::get('login_err') }}
                    @endif
                </span>
				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="name" placeholder="Name or Email" value="{{old('name')}}" required>
					<span class="shadow-input1"></span>
                    <span class="error">{{$errors->first('name')}}</span>
				</div>


				<div class="wrap-input1 validate-input">
					<input class="input1" type="password" name="password" placeholder="password" required>
					<span class="shadow-input1"></span>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" type="submit" value="submit">
						<span>
							Login
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>


@endsection
