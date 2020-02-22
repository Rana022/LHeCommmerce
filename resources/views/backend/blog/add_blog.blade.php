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
<form class="form-horizontal" action="{{url('/insert_blog')}}" method="post">
  @csrf			  
  <div class="control-group">
	 <label class="control-label" for="typeahead">Blog Title: </label>
    <input type="text" class="form-control" placeholder="Blog Title" name="blog_title">
  </div>

  <div class="control-group">
   <label class="control-label" for="typeahead">Blog Author: </label>
    <input type="text" class="form-control" placeholder="Blog Author" name="blog_author">
  </div>

  <div class="control-group">
 <label class="control-label" for="fileInput">Blog Image:</label>
 <div class="controls">
 <input class="input-file uniform_on" id="fileInput" type="file" name="blog_image">
 </div>
</div> 



  <div class="control-group">
    <textarea name="blog_details" cols="30" rows="10" class="form-control cleditor" placeholder="">Blog Details Here</textarea>
  </div>


  <div class="control-group form-check">
  <label class="control-label" for="typeahead">Active: </label>
    <input type="checkbox" class="form-check-input" value="1" name="publication_status">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
	</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection