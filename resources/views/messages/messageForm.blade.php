
@extends('layouts/layout')

@section('content')
	<div class="contact1">
		<div class="container-contact1 pt-2">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="{{ asset('images/img-01.png') }}" alt="IMG">
			</div>

			<form class="contact1-form validate-form" action="{{ route('create_message') }}" method="POST">
				<span class="contact1-form-title">
					Send Message
				</span>
				<div class="wrap-input1 validate-input" >
                <select class="form-control m-bot15 all_conts" name="send_to">
                        @foreach($all_contacts as $cont)
                            <option value="{{ $cont->id }}" >{{ $cont->email }}</option>
                        @endforeach
                </select>
                    <span class="shadow-input1"></span>
                    <span class="error">{{$errors->first('sendTo')}}</span>
				</div>

				<div class="wrap-input1 validate-input" >
					<input class="input1" type="text" name="subject" placeholder="Subject" value="{{old('subject')}}" required>
					<span class="shadow-input1"></span>
                    <span class="error">{{$errors->first('subject')}}</span>
				</div>

				<div class="wrap-input1 validate-input" >
					<textarea class="input1" name="message" placeholder="Message" required>{{old('message')}}</textarea >
					<span class="shadow-input1"></span>
                    <span class="error">{{$errors->first('message')}}</span>
				</div>

				<div class="container-contact1-form-btn">
					<button  type="submit"  value="Submit" class="contact1-form-btn">
						<span>
							Send Message
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

@endsection
