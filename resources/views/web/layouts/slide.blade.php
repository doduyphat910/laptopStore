<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
			<?php $i=0; ?>
		@foreach($slide as $sl)
		<?php $i++; ?>
		  <div class="item 
			@if($i==1)
			active
			@endif
		  ">
		  <div class="container">
			<a href="#"><img style="width:100%" src="Image/slide/{{$sl->image}}" alt="special offers"/></a>
			<div class="carousel-caption">
				  {{$sl->description}}
				</div>
		  </div>
		  </div>
		  @endforeach
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
