@extends('Admin1.index')
@section('content')
<!-- {{print_r($listCatalog)}} -->
<div class="page-wrapper">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Table Catalog </h4>
                  <h6 class="card-subtitle">Data table Catalog</h6>
                  <a href="admin/catalog/add" class="btn btn-warning btn-rounded m-b-10 m-l-5">Add</a>
                  <div class="table-responsive m-t-40">
                     <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                           <tr>

                              <th>id</th>
                              <th>Name</th>
                              <th>Action</th>

                              
                           </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($listCatalog as $catalog)
                           <tr>
                             
                              <td>{{$catalog->id}}</td>
                              <td>{{$catalog->name}}</td>
                              <td>
                                 <a href="admin/catalog/update/{{$catalog->id}}" class="btn btn-warning btn-rounded m-b-10 m-l-5">Edit</a>
                                <a href="admin/catalog/delete/{{$catalog->id}}" class="btn btn-danger btn-rounded m-b-10 m-l-5">Delete</a>
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