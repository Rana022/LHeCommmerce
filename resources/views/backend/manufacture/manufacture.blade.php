@extends('backend.back_layout')
@section('content')
	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>

						<div class="box-icon">
                           <a href="{{url('add/manufacture')}}" class="btn btn-small btn-warning float-right">Add Manufacture</a>

						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Manufacture Name</th>
								  <th>Updated</th>
								  <th>Created</th>
								  <th>Staus</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($manufacture as $row)
							<tr>
								<td>{{$row->manufacture_name}}</td>
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
									<a class="btn btn-danger" href="{{url('/inactive_manufacture/' . $row->id)}}">
										<i class="halflings-icon white thumbs-down"></i> 
									</a>
									@else
									<a class="btn btn-success" href="{{url('/active_manufacture/' . $row->id)}}">
										<i class="halflings-icon white thumbs-up"></i> 
									</a>
									@endif
									<a class="btn btn-info" href="{{url('edit/manufacture/' . $row->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{url('/delete/manufacture/' . $row->id)}}" id="delete">
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