
@extends(session('contact_id') ? 'layouts/layout' : 'layouts/app')

@section('content')
	<div class="contact1">
			<form class="contact1-form validate-form" action="{{ $modify == 1 ? route('update_contact') : route('create_contact')}}" method="POST">
				<span class="contact1-form-title">
					{{ $modify == 1 ? 'Edit Contact Info' : 'Create New Contact'}}
				</span>
                @if(isset($id))
                <input class="d-none" type="hiddin" value="{{$id}}" name='id'>
                @endif
				<div class="wrap-input1 validate-input" >
					<input class="input1" type="text" name="name" placeholder="Name" value="{{ old('name') ? old('name') : $name }}"  required >
					<span class="shadow-input1"></span>
                    <span class="error">{{$errors->first('name')}}</span>
				</div>

				<div class="wrap-input1 validate-input" >
					<input class="input1" type="text" name="email" placeholder="Email" value="{{ old('email') ? old('email') : $email }}"  required >
					<span class="shadow-input1"></span>
                    <span class="error">{{$errors->first('email')}}</span>
				</div>

				<div class="wrap-input1 validate-input" >
					<input class="input1" type="password" name="password" placeholder="password" value="{{ old('phone') ? '' : $phone }}" required>
					<span class="shadow-input1"></span>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

				<div class="wrap-input1 validate-input" >
					<input class="input1" type="number" name="phone" placeholder="phone" value="{{ old('phone') ? old('phone') : $phone }}" >
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" >
					<input class="input1" type="text" name="company" placeholder="Company" value="{{ old('company') ? old('company') : $company }}" >
					<span class="shadow-input1"></span>
                </div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" type="submit" value='submit'>
						<span>
					{{ $modify == 1 ? 'Save Changes' : 'Add Contact'}}
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>


@endsection
