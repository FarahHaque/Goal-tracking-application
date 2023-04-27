@extends('admin.layout.master')
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Goal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Goal</li>
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
                <h3 class="card-title">Goal</h3>
        

                <a href="{{route('goal.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
                
            

               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Target Date</th>
                    <th>Priority</th>
                    <th>Task Amount</th>
                    <th>Goal Type</th>
                    <th>User</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                 
                  
                   
                            
                   
                   
                    @foreach ($goal as $key=>$item)
                          
                 
               
                 <tr>
                   <td>{{++$key}}</td>
                   <td>
                    @if (Auth::user()->role == 'user')
                    <a href="{{route('task_by_id',$item->id)}}" class="float-right btn btn-outline-info btn-sm mb-2"><i class="fas fa-list"></i>{{$item->title}}</a>
                    @else
                    {{$item->title}}
                  @endif
                   
                  
                  </td>
                   <td>{{$item->description}}</td>
                   <td>{{$item->target_date}}</td>
                   <td>{{$item->priority}}</td>
                   <td>{{$item->task_amount}}</td>
                   <td>{{$item->type}}</td>
                  <td> <a href=""> {{@$item->user->name}}</a></td>
                  
               
                   <td>
                    
                     <a href="{{route('goal.edit',[$item])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                    
                   
                   
                     <form action="{{route('goal.destroy',[$item])}}" method="POST">
                       @method('DELETE')
                       @csrf
                       <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                   </form>

                   @if (Auth::user()->role == "user")
                   <a href="{{route('all_users',[$item->id])}}" title="Add Collaborator" class=" btn btn-outline-secondary btn-sm mb-2"><i class="fas fa-plus-square"></i> </a>
                   @endif
          
               
                   </td>
                 
                 </tr>
      @endforeach





                
    

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Target Date</th>
                    <th>Priority</th>
                    <th>Task Amount</th>
                    <th>Goal Type</th>
                    <th>User</th>
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