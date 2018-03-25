<div id="sidebar" class="span3">

		<ul id="sideManu" class="nav nav-tabs nav-stacked">
      <div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
			@foreach($catalog as $cata)
				<li><a href="listCatalog/{{$cata->id}}">{{$cata->name}}</a></li>
			@endforeach
		</ul>
		<br/>
			<div class="well well-small">
				<h4>Sản phẩm mới nhất </h4>
			</div>
		@foreach($lastest_product as $last)
		  <div class="thumbnail">
			<img src="Image/{{$last->image}}" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>{{$last->name}}</h5>
				<h4 style="text-align:center"><a class="btn" href="detail/{{$last->id}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> 
					<br><a class="btn btn-primary" href="detail/{{$last->id}}">
            {{number_format($last->price,0 ,"," ,"." )}} VND</a></h4>
			</div>
		  </div><br/>
		@endforeach
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>