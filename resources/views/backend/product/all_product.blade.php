@extends('backend.back_layout')
@section('content')
	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>

						<div class="box-icon">
                           <a href="{{url('add/product')}}" class="btn btn-small btn-warning float-right">ADD PRODUCT</a>

						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Name</th>
								  <th>Category Id</th>
								  <th>Manufacture Id</th>
								  <th>Product Prize</th>
								  <th>Product Size</th>
								  <th>Product Color</th>
								  <th>Product Image</th>
								  <th>Updated</th>
								  <th>Created</th>
								  <th>Staus</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($product as $row)
							<tr>
								<td>{{$row->product_name}}</td>
								<td>{{$row->category_name}}</td>
								<td>{{$row->manufacture_name}}</td>
								<td>{{$row->product_prize}}</td>
								<td>{{$row->product_size}}</td>
								<td>{{$row->product_color}}</td>
								<td class="center"><img src="{{URL::to($row->product_image)}}" alt="" height="60px" width="60px"></td>
								<td class="center">{{$row->updated_at}}</td>
								<td class="center">{{$row->created_at}}</td>
								<td class="center">
									
											@if ($row->publication_status==1)
										<span class='label label-success'>Active</span>
											@else
										<span class='label label-danger'>Inactive</span>
											@endif
	
									
								</td>
								<td class="center">
									@if($row->publication_status==1)
									<a class="btn btn-danger" href="{{url('/inactive_product/' . $row->id)}}">
										<i class="halflings-icon white thumbs-down"></i> 
									</a>
									@else
									<a class="btn btn-success" href="{{url('/active_product/' . $row->id)}}">
										<i class="halflings-icon white thumbs-up"></i> 
									</a>
									@endif
									<a class="btn btn-info" href="{{url('edit/product/' . $row->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{url('/delete/product/' . $row->id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						  </tbody>
					  </table>  

					</div>
				</div><!--/span-->
			</div><!--/row-->
@endsection