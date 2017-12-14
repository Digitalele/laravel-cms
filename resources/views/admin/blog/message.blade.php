@if(session('message'))
	<div class="alert alert-info">
		{{ session('message') }}
	</div>
@elseif(session('trash-message'))
	<div class="alert alert-info">
		@php list($message, postId) = session('trash-message') @endphp
		{{ $message }}
		<a href="{{ route('admin.blog.restore', $postId) }}">Undo</a>
	</div>
@endif