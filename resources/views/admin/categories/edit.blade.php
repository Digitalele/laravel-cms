@extends('layouts.admin.main')

@section('title', 'AdminArea | Edit Post')

@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Blog
			<small>Edit post</small>
		  </h1>
		  <ol class="breadcrumb">
				<li>
					<a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="active">
					<a href="{{ route('admin.blog.index') }}">Blog</a>
				</li>
				<li class="active">Edit Post</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				{!! Form::model($post, [
						'method' => 'PUT',
						'route'  => ['admin.blog.update', $post->id],
						'files'  => true,
						'id' => 'post-from'
				 	]) !!}
			 
			@include('admin.blog.form')

			{!! Form::close() !!}
			</div>
		  <!-- ./row -->
		</section>
		<!-- /.content -->
	</div>
@endsection



