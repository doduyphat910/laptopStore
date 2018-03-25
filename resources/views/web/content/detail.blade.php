@extends('web.layouts.index2')

@section('content')
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="<span></span>">Home</a> <span class="divider">/</span></li>
    <li><a href="listCatalog/{{$catalog_detail->id}}">{{$catalog_detail->name}}</a> <span class="divider">/</span></li>
    <li class="active">{{$product_detail->name}}</li>
    </ul>	
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="Image/{{$product_detail->image}}" title="{{$product_detail->name}}">
				<img src="Image/{{$product_detail->image}}" style="width:100%" />
            </a>
			<div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="Image/{{$product_detail->image}}"> <img style="width:29%" src="Image/{{$product_detail->image}}" alt=""/></a>
                   <a href="Image/{{$product_detail->image}}"> <img style="width:29%" src="Image/{{$product_detail->image}}" alt=""/></a>
                   <a href="Image/{{$product_detail->image}}" > <img style="width:29%" src="Image/{{$product_detail->image}}" alt=""/></a>
                  </div>
                </div>
               
			 
              </div>
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn" ><i class="icon-print"></i></span>
				<span class="btn" ><i class="icon-zoom-in"></i></span>
				<span class="btn" ><i class="icon-star"></i></span>
				<span class="btn" ><i class=" icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
			</div>
			<div class="span6">
				<h3>{{$product_detail->name}}</h3>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>{{number_format($product_detail->price,0 ,"," ,"." )}} VND</span></label>
					<div class="controls">
					<input type="number" class="span2" placeholder="Số lượng "/>
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Thêm vào giỏ hàng <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<hr class="soft clr"/>
				<p>
				<?php 
					$des = $product_detail['description'];
					$des = nl2br($des);
				 ?>
				<?php echo $des; ?>
				</p>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active" ><a href="#home" data-toggle="tab">Sản phẩm liên quan</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
		<div class="tab-pane fade active in" id="home">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>
		<hr class="soft"/>
		<div class="tab-content">
			<div class="tab-pane" id="listView">
				@foreach($product_relation as $pr_rela)
				<div class="row">	  
					<div class="span2">
						<img src="Image/{{$pr_rela->image}}" alt=""/>
					</div>
					<div class="span4">
						<h3>{{$pr_rela->name}}</h3>				
						<hr class="soft"/>
						<h5>Product Name </h5>
						<p>
						<?php 
							$des = $pr_rela['description'];
							$des = nl2br($des);
							$des = substr($des, 0, 200);
							echo $des . " ...";
						?>
						</p>
						<a class="btn btn-small pull-right" href="detail/{{$pr_rela->id}}">View Details</a>
						<br class="clr"/>
					</div>
					<div class="span3 alignR">
					<form class="form-horizontal qtyFrm">
					<h3>{{number_format($pr_rela->price,0 ,"," ,"." )}} VND</h3>
					<div class="btn-group">
					  <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
					  <a href="detail/{{$pr_rela->id}}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soft"/>
			@endforeach
		</div>
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					@foreach($product_relation as $pr_rela)
					<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html"><img src="Image/{{$pr_rela->image}}" alt=""/></a>
						<div class="caption">
						  <h5>{{$pr_rela->name}}</h5>
						  <p> 
							<b><i>{{number_format($pr_rela->price,0 ,"," ,"." )}} VND</i></b>
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> </h4>
						</div>
					  </div>
					</li>
					@endforeach
				  </ul>
			<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
</div> </div>
</div>
@endsection