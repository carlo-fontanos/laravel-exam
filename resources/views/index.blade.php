@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">{{ $title }}</div>
		<div class="panel-body">
			<form method="post" action="{{ url('/add') }}" class="create-product">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="pacient">Product name</label>
					<input type="text" class="form-control" name="name" value="" />
				</div>
				<div class="form-group">
					<label for="pacient">Quantity in stock</label>
					<input type="text" class="form-control" name="quantity" value="" />
				</div>
				<div class="form-group">
					<label for="pacient">Price per item</label>
					<input type="text" class="form-control" name="price" value="" />
				</div>
				<input type="submit" class="btn btn-primary" value="Add" />
			</form>
		</div>
		
		<div class="products-data"></div>
	</div>
@endsection