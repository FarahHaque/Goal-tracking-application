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
                  
                    <th>Email</th>
                 
                    <th>Degignation</th>
                    <th>Country</th>

                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                 
                  
                   
                            
                   
                   
                    @foreach ($users as $key=>$item)
                          
                 @if ($item->id != Auth::user()->id)
                     
                
               
                 <tr>
                   <td>{{++$key}}</td>
                   <td>{{$item->name}}</td>
                  
                   <td>{{$item->email}}</td>
              
                   <td>{{$item->designation}}</td>
                   <td>{{$item->country}}</td>
                 
                  
                  
               
                   <td>
                    
                    <form action="{{route('send_offer')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                        <input type="hidden" name="collab_id" value="{{$item->id}}"/>
             
                        <input type="hidden" name="goal_id" value="{{$goal_id}}"/>
                        <input type="hidden" name="send_status" value="1" />
                        <button type="submit" class="btn btn-outline-success btn-sm" ><i class="fas fa-check"></i> Send</button>
                    </form>

          
               
                   </td>
                 
                 </tr>
                 @endif
      @endforeach





                
    

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                  
                    <th>Email</th>
                 
                    <th>Degignation</th>
                    <th>Country</th>

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