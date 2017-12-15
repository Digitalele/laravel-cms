@if(session('message'))
	<div class="alert alert-info">
		{{ session('message') }}
	</div>
@elseif(session('trash-message'))
	
		@php list($message, $postId) = session('trash-message') @endphp
		{!! Form::open(['method' => 'PUT', 'route' => ['admin.blog.restore', $postId]]) !!}
		<div class="alert alert-info">
			{{ $message }}
			<button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-undo"></i>Undo</button>
		</div>
		{!! Form::close() !!}

@endif