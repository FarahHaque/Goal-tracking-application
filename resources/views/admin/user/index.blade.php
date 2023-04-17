@extends('admin.layout.master')
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row offset-3">
          <!-- left column -->
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">User</h3>
                
              
                
                      
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Bio</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Degignation</th>
                    <th>Country</th>
                    <th>BirthDate</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                 
                  
                   
                            
                   
                   
                    @foreach ($user as $key=>$item)
                          
                 
               
                 <tr>
                   <td>{{++$key}}</td>
                   <td>{{$item->name}}</td>
                   <td>{{$item->bio}}</td>
                   <td>{{$item->email}}</td>
                   <td>{{$item->phone}}</td>
                   <td>{{$item->designation}}</td>
                   <td>{{$item->country}}</td>
                   <td>{{$item->birthdate}}</td>
                   <td>{{$item->gender}}</td>
                   <td>{{$item->role}}</td>
                  
                  
               
                   <td>
                    
                     <a href="{{route('user.edit',[$item->id])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                    
                   
                   
                     <form action="{{route('user.destroy',[$item->id])}}" method="POST">
                       @method('DELETE')
                       @csrf
                       <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                   </form>
          
               
                   </td>
                 
                 </tr>
      @endforeach





                
    

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Bio</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Degignation</th>
                    <th>Country</th>
                    <th>BirthDate</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Action</th>
                  
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
        
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection