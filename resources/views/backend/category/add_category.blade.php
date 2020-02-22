@extends('backend.back_layout')
@section('content')
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
                           <a href="{{route('category')}}" class="btn btn-small btn-warning float-right">CATEGORY</a>
							
						</div>
					</div>
					<div class="box-content">
						@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
						<form class="form-horizontal" action="{{url('insert/category')}}" method="post">
							@csrf
						  
  <div class="form-group">
    <input type="text" class="form-control" placeholder="CATEGORY" name="category_name">
  </div>

  <div class="form-group form-check">
    <label class="form-check-label" for="exampleCheck1">Publication Status: Active</label>
    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="publication_status">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection