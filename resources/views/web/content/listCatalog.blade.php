@extends('web.layouts.index2')

@section('content')
		<div class="span9">		
			<div class="well well-small">
				<h4>Laptop </h4>
			</div>
		</div>
			  <ul class="thumbnails">
			  	@foreach($product as $pro)
				<li class="span3">
				  <div class="thumbnail img-thumbnail img-fluid">
					<a  href="product_details.html"><img class="img-thumbnail img-fluid" src="Image/{{$pro->image}}" alt=""/></a>
					<div class="caption">
					  <h5>{{$pro->name}}</h5>
					 
					  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{$pro->price}} VND</a></h4>
					</div>
				  </div>
				</li>
				@endforeach
			  </ul>	
		</div>
		</div>
	</div>
</div>
			  <div style="text-align: center;" class="pagination" >{{ $product->links() }}</div>


@endsection