@extends('Admin1.index')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
<div class="row">
<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4> Form add </h4>

                            </div>
                            @if(session('notification'))
								<div class="alert alert-success">
									{{session('notification')}}
								</div>
                            @endif
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="admin/laptop/postAdd" method="post">
                                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="name">
                                            <label>Price</label>
                                            <input type="text" name="price" class="form-control" placeholder="Price">
                                            <label>Image</label>
                                            <input type="text" name="image" class="form-control" placeholder="Image">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" placeholder="Desciption"> </textarea>
                                            <label>Amount</label>
                                            <input type="text" name="amount" class="form-control" placeholder="Amount">
                                            <label >Catalog </label>
                                            
                                                <select class="form-control" id="val-skill" name="idCatalog">
                                                              
                                                    <option  >Please select</option>

                                                    @foreach($listCatalog as $catalog)  
                                                    <option value="{{$catalog->id}}">{{$catalog->name}}</option>
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