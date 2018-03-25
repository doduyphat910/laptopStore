@extends('web.layouts.index2')

@section('content')
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li class="active"> Giỏ hàng</li>
  </ul>
  <h3>  Giỏ hàng [ <small id="count">{{$count}} Item(s) </small>]<a href="product" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Quay lại trang chủ </a></h3>  
  <hr class="soft"/>
  <table class="table table-bordered">
    <tr><th> I AM ALREADY REGISTERED  </th></tr>
    <tr> 
     <td>
      <form class="form-horizontal">
        <div class="control-group">
          <label class="control-label" for="inputUsername">Username</label>
          <div class="controls">
            <input type="text" id="inputUsername" placeholder="Username">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword1">Password</label>
          <div class="controls">
            <input type="password" id="inputPassword1" placeholder="Password">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
          </div>
        </div>
      </form>
    </td>
  </tr>
</table>    

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Sản phẩm</th>
      <th>Mô tả</th>
      <th>Số lượng/Cập nhật</th>
      <th>Giá</th>
      <th>Tổng cộng</th>
    </tr>
  </thead>
  <tbody>
    <form action="" method="get" >
      <input type="hidden" name="_token" value="{{csrf_token()}}">
    @foreach($content as $ct)
    <tr>
      <td> <img width="60" src="Image/{{$ct->options->img}}" alt=""/></td>
      <td>{{$ct->name}}</td>
      <td>
        <div class="input-append">
          <input id="qty{{$ct->rowId}}" class="span1 quantity" style="max-width:34px" placeholder="0" 
           size="16" type="text" value="{{$ct->qty}}">
          <button class="btnMinus btn"  id="{{$ct->rowId}}" type="button">
            <i class="icon-minus"></i></button>
          <button class="btnPlus btn" id="{{$ct->rowId}}" type="button">
            <i class="icon-plus"></i></button>
          <a href="deleteCart/{{$ct->rowId}}" class="btn btn-danger" ">
          <i class="icon-remove icon-white"></i></a>
        </div>
      </td>
{{--       <td>{{number_format($ct->price,2 ,",", "." )}} VND</td>
 --}}      
  <td>{{number_format($ct->options->priceDefault,2 ,",", "." )}} VND</td>
    <td><label id="price{{$ct->rowId}}">
      {{number_format(($ct->options->priceDefault) *($ct->qty),0 ,",", "." )}} VND</label></td>
    </tr>
    @endforeach
    </form>
    <tr>
      <td colspan="4" style="text-align:right"><strong>Tổng =</strong></td>
      <td class="label label-important" style="display:block"> <strong id="total">
      {{number_format($total,0 ,",", "." )}} VND</strong></td>
    </tr>
  </tbody>
</table>
   
<a href="product" class="btn btn-large"><i class="icon-arrow-left"></i> Quạy lại trang chủ </a>
<a href="login.html" class="btn btn-large pull-right">Tiếp tục <i class="icon-arrow-right"></i></a>

</div>
</div></div>
</div>
@endsection