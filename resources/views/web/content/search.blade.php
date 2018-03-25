@extends('web.layouts.index2')

@section('content')
<?php 
function changeColor($str, $key){
	return str_replace($key, "<span style='color: red'>$key</span>", $str);
}
?>
		<div class="span9">		
			<h3>Từ khóa : {{$key}}</h3>
			<div class="well well-small">
				<h4>Laptop </h4>
			</div>
		</div>
			  <ul class="thumbnails">
			  	@foreach($search as $srch)
				<li class="span3">
				  <div class="thumbnail img-thumbnail img-fluid">
					<a  href="product_details.html"><img class="img-thumbnail img-fluid" src="Image/{{$srch->image}}" alt=""/></a>
					<div class="caption">
					  <h5>{!!changeColor($srch->name,$key)!!}</h5>
					 
					  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{$srch->price}} VND</a></h4>
					</div>
				  </div>
				</li>
				@endforeach
			  </ul>	
		</div>
		</div>
	</div>
</div>
			  <div style="text-align: center;" class="pagination" >{{ $search->links() }}</div>


@endsection