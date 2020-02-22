@extends('backend.back_layout')
@section('content')
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
                           <a href="{{route('product')}}" class="btn btn-small btn-warning float-right">product</a>
							
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
<form class="form-horizontal" action="{{url('insert/product')}}" method="post" enctype="multipart/form-data">
 {{csrf_field()}}				  
  <div class="control-group">
	 <label class="control-label" for="typeahead">Product Name: </label>
    <input type="text" class="form-control" placeholder="Product Name" name="product_name">
  </div>

  <div class="control-group">
  <label class="control-label" for="typeahead">Category: </label>
  @php
  	$category = DB::table('tbl_categories')
  	            ->where('publication_status', 1)
  	            ->get();
  @endphp
    <select name="category" id="">
      <option value="">Select Category</option>
    	@foreach($category as $row)
    	<option value="{{$row->id}}">{{$row->category_name}}</option>
    	@endforeach
    </select>
  </div>

  <div class="control-group">
  <label class="control-label" for="typeahead">Manufacture: </label>
  @php
  	$manufacture = DB::table('tbl_manufacture')
  	            ->where('publication_status', 1)
 	            ->get();
  @endphp
    <select name="manufacture" id="">
      <option value="">Select Manufacture</option>
    	@foreach($manufacture as $row)
    	<option value="{{$row->id}}">{{$row->manufacture_name}}</option>
    	@endforeach
    </select>
  </div>

  <div class="control-group">
    <textarea name="product_short_description" id="" cols="30" rows="10" class="form-control cleditor" placeholder="">Short Description Here</textarea>
  </div>

  <div class="control-group">
    <textarea name="product_short_description" id="" cols="30" rows="10" class="form-control cleditor">Long Description Here</textarea>
  </div>

   <div class="control-group">
  <label class="control-label" for="typeahead">Product Prize: </label>
    <input type="text" class="form-control" placeholder="Product Prize" name="product_prize">
  </div>

   <div class="control-group">
  <label class="control-label" for="typeahead">Product Size: </label>
    <input type="text" class="form-control" placeholder="Product Size" name="product_size">
  </div>

  <div class="control-group">
  <label class="control-label" for="typeahead">Product Color: </label>
    <input type="text" class="form-control" placeholder="Product Color" name="product_color">
  </div>

 <div class="control-group">
 <label class="control-label" for="fileInput">Product Image:</label>
 <div class="controls">
 <input class="input-file uniform_on" id="fileInput" type="file" name="product_image">
 </div>
</div> 

  <div class="control-group form-check">
  <label class="control-label" for="typeahead">Active: </label>
    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="publication_status">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
	</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection