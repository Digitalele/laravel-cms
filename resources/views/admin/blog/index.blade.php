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
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
			  <div class="col-xs-12">
				<div class="box">
				  <!-- /.box-header -->
				  <div class="box-body ">
					 <table class="table table-bordered">
						<thead>
							<tr>
								<td>Action</td>
								<td>Delete</td>
								<td>Title</td>
								<td>Author</td>
								<td>Category</td>
								<td>Date</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<a href="#" class="btn btn-xs btn-default">
										<i class="fa fa-edit"></i>
									</a>
								</td>
								<td>
									<a href="#" class="btn btn-xs btn-danger">
										<i class="fa fa-times"></i>
									</a>
								</td>
								<td>
									Lorem ipsum dolor.
								</td>
								<td>
									Gabriele Dolfi
								</td>
								<td>
									Web Programming
								</td>
								<td>
									2018
								</td>
							</tr>
						</tbody>
					 </table>
				  </div>
				  <!-- /.box-body -->
				  <div class="box-footer clearfix">
				  	<div class="pull-left">
					  	<ul class="pagination no-margin">
					  		<li><a href="">&laquo;</a></li>
					  		<li><a href="">1</a></li>
					  		<li><a href="">2</a></li>
					  		<li><a href="">3</a></li>
					  		<li><a href="">&raquo;</a></li>
					  	</ul>	
				  	</div>
				  	<div class="pull-right">
				  		<small>4 items</small>
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
