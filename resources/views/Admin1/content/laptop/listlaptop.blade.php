@extends('Admin1.index')
@section('content')
<div class="page-wrapper">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Row grouping </h4>
                  <h6 class="card-subtitle">Data table example</h6>
                  <a href="admin/laptop/add" class="btn btn-warning btn-rounded m-b-10 m-l-5">Add</a>

                  <div class="table-responsive m-t-40">
                     <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>id</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Image</th>
                              <th>Description</th>
                              <th>Amount</th>
                              <th>Catalog_id</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($listLaptop as $laptop)
                           <tr>
                              <td>{{$laptop->id}}</td>
                              <td>{{$laptop->name}}</td>
                              <td>{{$laptop->price}}</td>
                              <td>{{$laptop->image}}</td>
                              <td>
                                 <?php 
                                 $des = $laptop['description'];
                                 $des = nl2br($des);
                               ?>
                              <?php echo $des; ?>
                              </td>

                              <td>{{$laptop->amount}}</td>
                              <td>{{$laptop->catalog_id}}</td>
                              <td>
                                 <a href="admin/laptop/update/{{$laptop->id}}" class="btn btn-warning btn-rounded m-b-10 m-l-5">Edit</a>
                                <a href="admin/laptop/delete/{{$laptop->id}}" class="btn btn-danger btn-rounded m-b-10 m-l-5">Delete</a>
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