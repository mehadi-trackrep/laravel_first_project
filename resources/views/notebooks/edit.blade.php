@extends('layouts.base')



@section('content')
        <!-- /navbar -->
        <!-- Main component for call to action -->
        <div class="container">
        	<h1>
        		Edit Notebook
        	</h1>
        	<form action="/notebooks/{{$notebook->id}}" method="POST">
{{ csrf_field() }} <!-- for security from bad intruders while passing data-->
{{ method_field('PUT') }}
        		<div class="form-group">
        			<label for="name">
        				Notebook Name
        			</label>
        			<input class="form-control" type="text" name="name" placeholder="Enter notebook name" required="">
        		</div>
        		<input class="btn btn-primary" type="submit" name="done" value="update">
        	</form>
        </div>
    
@endsection