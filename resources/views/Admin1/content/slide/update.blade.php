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
                                    <form action="admin/slide/postUpdate/{{$updateSlide->id}}" method="post">
                                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$updateSlide->name}}" placeholder="name">
                                            <input type="text" name="image" class="form-control" value="{{$updateSlide->image}}" placeholder="image">
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