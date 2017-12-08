@extends ('layouts.main')

@section('title', 'Laravel cms | Contact')

@section('content')

	<div class="container">
		@if (Session::has('success'))
			<div class="alert alert-info">{{ Session::get('success') }}</div>
		@endif
		<div class="row">
			<div class="col-md-3 col-md-offset-4">
				<h1 class="text-center">Contact Me</h1>
				<hr>
				<form action="{{ route('contact') }}" method="post" id="contact-form">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="subject">Subject</label>
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
					</div>
					<div class="form-group">
						<label for="message">Message</label>
						<input type="text" class="form-control" id="message" name="message" placeholder="Message">
					</div>
					
					<button type="submit" value="Send Message" class="btn btn-default">Submit</button>

					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

				</form>
			</div>	
		</div>
	</div>

	
		
@endsection

