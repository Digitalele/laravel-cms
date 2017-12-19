@extends('layouts.admin.main')

@section('title', 'AdminArea | Edit Category')

@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Category
			<small>Edit Category</small>
		  </h1>
		  <ol class="breadcrumb">
				<li>
					<a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="active">
					<a href="{{ route('admin.categories.index') }}">Categories</a>
				</li>
				<li class="active">Edit Category</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				{!! Form::model($category, [
						'method' => 'PUT',
						'route'  => ['admin.categories.update', $category->id],
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



