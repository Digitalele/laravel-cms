@extends('layouts.admin.main')

@section('title', 'AdminArea | Add new post')

@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Blog
			<small>Add new post</small>
		  </h1>
		  <ol class="breadcrumb">
				<li>
					<a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="active">
					<a href="{{ route('admin.blog.index') }}">Blog</a>
				</li>
				<li class="active">Add New</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				{!! Form::model($post, [
						'method' => 'POST',
						'route'  => 'admin.blog.store',
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



