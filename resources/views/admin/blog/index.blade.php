@extends('layouts.admin.main')

@section('title', 'AdminArea | Blog Index')

@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Blog
			<small>Display All blog posts</small>
		  </h1>
		  <ol class="breadcrumb">
				<li>
					<a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="active">
					<a href="{{ route('admin.blog.index') }}">Blog</a>
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
							<a href="{{ route('admin.blog.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>Add New</a>
						</div>
						<div class="pull-right" style="padding: 7px 7px 0 0;">
							@php $links = [] @endphp  
	                        @foreach($statusList as $key => $value)
	                            @if($value)
	                            @php 
	                            	$selected = Request::get('status') == $key ? 'selected-status' : '' 
	                            @endphp
	                             @php
	                             	$links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>"
	                             @endphp
	                             	                     
	                            @endif
	                        @endforeach
                        	{!! implode(' | ', $links) !!}
						</div>
					</div>
				  <!-- /.box-header -->
				  <div class="box-body ">

				  	@include('admin.partials.message')
				  
				  	@if (! $posts->count())
					  	<div class="alert alert-warning">
					  		 <strong>No records found</strong>
					  	</div>
				  	@else
					
						@if($onlyTrashed)
							@include('admin.blog.table-trash')
						@else
							@include('admin.blog.table')
						@endif
					@endif

				  </div>
				  <!-- /.box-body -->
				  <div class="box-footer clearfix">
				  	<div class="pull-left">
					  	{{ $posts->appends( Request::query() )->render() }}
				  	</div>
				  	<div class="pull-right">
				  		<small>{{ $postCount }} {{ str_plural('Item', $postCount) }}</small>
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


