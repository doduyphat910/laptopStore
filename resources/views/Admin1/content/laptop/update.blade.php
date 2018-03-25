@extends('Admin1.index')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-6">
            <div class="card">
               <div class="card-title">
                  <h4> Form Update </h4>
               </div>
               @if(session('notification'))
               <div class="alert alert-success">
                  {{session('notification')}}
               </div>
               @endif
               <div class="card-body">
                  <div class="basic-form">
                     <form action="admin/user/postUpdate/{{$user->id}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                           <label>Name</label>
                           <input type="text" name="name" class="form-control" placeholder="name" value="{{$updateLaptop->name}}">
                           <label>Price</label>
                           <input type="number" name="price" class="form-control" placeholder="Price" value="{{$updateLaptop->price}}">
                           <label>Image</label>
                           <input type="text" name="image" class="form-control" placeholder="Image" value="{{$updateLaptop->image}}">
                           <label>Description</label>
                           <textarea name="description" class="form-control" placeholder="Desciption">{{$updateLaptop->description}} </textarea>
                           <label>Amount</label>
                           <input type="number" name="amount" class="form-control" placeholder="Amount" value="{{$updateLaptop->amount}}">
                           <label >Catalog </label>
                           <select class="form-control" id="val-skill" name="idCatalog">
                              <option  >Please select</option>
                              @foreach($listCatalog as $catalog)  
                              <option value="{{$catalog->id}}" @if($catalog->id == $updateLaptop->catalog_id) selected="{{$catalog->name}}" @endif>{{$catalog->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection