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
                  <h6 class="card-subtitle">Data table example</h6>

                  <a href="admin/slide/add" class="btn btn-warning btn-rounded m-b-10 m-l-5">Add</a>

                  <div class="table-responsive m-t-40">
                     <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Image</th>
                              <th>Description</th>
                              <th>Link</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($listSlide as $slide)
                           <tr>
                              <td>{{$slide->id}}</td>
                              <td>{{$slide->name}}</td>
                              <td>{{$slide->image}}</td>
                              <td>{{$slide->desciption}}</td>
                              <td>{{$slide->link}}</td>
                              <td>
                                 <a href="admin/slide/update/{{$slide->id}}" class="btn btn-warning btn-rounded m-b-10 m-l-5">Edit</a>
                                <a href="admin/slide/delete/{{$slide->id}}" class="btn btn-danger btn-rounded m-b-10 m-l-5">Delete</a>
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