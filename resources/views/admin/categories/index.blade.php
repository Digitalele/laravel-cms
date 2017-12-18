@extends('layouts.admin.main')

@section('title', 'AdminArea | Categories')

@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Categories
			<small>Display All categories posts</small>
		  </h1>
		  <ol class="breadcrumb">
				<li>
					<a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="active">
					<a href="{{ route('admin.categories.index') }}">Categories</a>
				</li>
				<li class="active"></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
			  <div class="col-xs-12">
				<div class="box">
					<div class="box-header clearfix">
						<div class="pull-left">
							<a href="{{ route('admin.categories.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>Add New</a>
						</div>
						<div class="pull-right">
							
						</div>
					</div>
				  <!-- /.box-header -->
				  <div class="box-body ">

				  	@include('admin.partials.message')
				  
				  	@if (! $categories->count())
					  	<div class="alert alert-warning">
					  		 <strong>No records found</strong>
					  	</div>
				  	@else
						@include('admin.categories.table')
					@endif

				  </div>
				  <!-- /.box-body -->
				  <div class="box-footer clearfix">
				  	<div class="pull-left">
					  	{{ $categories->appends( Request::query() )->render() }}
				  	</div>
				  	<div class="pull-right">
				  		<small>{{ $categoriesCount }} {{ str_plural('Item', $categoriesCount) }}</small>
				  	</div>
				  </div>
				</div>
				<!-- /.box -->
			  </div>
			</div>
		  <!-- ./row -->
		</section>
		<!-- /.content -->
	</div>
@endsection


