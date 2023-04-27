@extends('admin.layout.master')
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Invitation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invitation</li>
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
                <h3 class="card-title">Invitation List</h3>
                
              
                
                      
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                  
                    <th>Goal</th>
                 
                    <th>Status</th>
                 

                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($collab as $key=>$item)
                          
             
                    @php
                        $goal_name = App\Models\Goal::where('id',$item->goal_id)->first();
                        $user_name = App\Models\User::where('id', $item->user_id)->first();
                    @endphp
               
              
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$user_name->name}}</td>
                 
                  <td>
                    @if ($item->status == 1)
                    <a href="{{route('task_by_id',$item->goal_id)}}"> {{$goal_name->title}}</a>
                    @else
                        {{$goal_name->title}}
                    @endif
                  
                
                </td>
             
                  <td>
                       @if ($item->status == 1)
                           <span class="badge badge-success">Accepted</span>

                       @elseif($item->status == 0)
                       <span class="badge badge-warning">Pending</span>
                       @endif
                  </td>
               
              
                  <td>
                   
                   <form action="{{route('accept_offer')}}" method="post">
                       @csrf
                       <input type="hidden" name="id" value="{{$item->id}}" />
                       <input type="hidden" name="status" value="1" />
                       <button type="submit" class="btn btn-outline-success btn-sm" ><i class="fas fa-check"></i> Accept</button>
                   </form>

         
              
                  </td>
                
                </tr>
             
     @endforeach





               
   


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                  
                    <th>Goal</th>
                 
                    <th>Status</th>
                 

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