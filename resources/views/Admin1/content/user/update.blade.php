@extends('Admin1.index')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
<div class="row">
<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4> Form Update </h4>
                                @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
                            </div>
                            @if(session('notification'))
								<div class="alert alert-primary">
									{{session('notification')}}
								</div>
                            @endif
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="admin/user/postUpdate/{{$updateUser->id}}" method="post">
                                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$updateUser->name}}">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email" value=" {{$updateUser->email}}"><br>
                                           
                                           {{--  <input type="checkbox" id="doipass" name="changePassword" class="changePassword"> <label>Change Password</label><br> --}}

                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control password1" placeholder="Password"/>
                                            <label>Confirm  password</label>
                                            <input type="password" name="passwordAgain" class="form-control password1" placeholder="Confirm  password"/><br>
                                            <label>Level </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="level" value="1"
                                                    @if($updateUser->level==0){{"checked"}}@endif
                                                > Admin   
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="level" value="0"
                                                 @if($updateUser->level==0){{"checked"}}@endif
                                                > Thường   
                                            </label>
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
{{-- @section('script')
    <script>
        $(document).ready(function()
        {
            $("#doipass").change(function(){
                if($(this).is(":checked"))
                {
                   alert('cấc');
                }else
                {   
                    $(".password1").attr('disabled','');
                }
            });
        });
                
    </script>
@endsection --}}