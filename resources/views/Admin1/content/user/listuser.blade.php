@extends('Admin1.index')
@section('content')
<!-- Button trigger modal -->

<div class="page-wrapper">
   <div class="container-fluid">
      <div class="row">

         <div class="col-12">

            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Row grouping </h4>
                  <h6 class="card-subtitle">Data table user</h6>

                  <a href="admin/user/add" class="btn btn-warning btn-rounded m-b-10 m-l-5">Add</a>

                  <div class="table-responsive m-t-40">
                     <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Level</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($user as $usr)
                           <tr>
                              <td>{{$usr->id}}</td>
                              <td>{{$usr->name}}</td>
                              <td>{{$usr->email}}</td>
                              <td>
                              @if($usr->level==1)
                              {{"Admin"}}
                              @else
                              {{"Thuong"}}
                              @endif
                              </td>
                              <td>
                                 <a href="admin/user/update/{{$usr->id}}" class="btn btn-warning btn-rounded m-b-10 m-l-5">Edit</a>
                                <a href="admin/user/delete/{{$usr->id}}" class="btn btn-danger btn-rounded m-b-10 m-l-5">Delete</a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection