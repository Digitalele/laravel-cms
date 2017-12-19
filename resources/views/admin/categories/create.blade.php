@extends('layouts.admin.main')

@section('title', 'AdminArea | Add new category')

@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Categories
			<small>Add new Category</small>
		  </h1>
		  <ol class="breadcrumb">
				<li>
					<a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="active">
					<a href="{{ route('admin.categories.index') }}">Categories</a>
				</li>
				<li class="active">Add New</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				{!! Form::model($category, [
						'method' => 'POST',
						'route'  => 'admin.categories.store',
						'files'  => true,
						'id' => 'category-from'
				 	]) !!}
			 
			@include('admin.categories.form')

			{!! Form::close() !!}
			</div>
		  <!-- ./row -->
		</section>
		<!-- /.content -->
	</div>
@endsection



