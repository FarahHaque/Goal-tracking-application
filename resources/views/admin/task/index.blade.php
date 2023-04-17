@extends('admin.layout.master')
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Task</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Task</li>
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
                <h3 class="card-title">Task <span class="badge badge-primary">       ({{$taskCount}})</span>
           </h3>
                
              
                <a href="{{route('task.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
             
                @php
                    $goal_id =    session()->get('goal_id');
                    session()->put('goal_id',$goal_id)
                 @endphp
               
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
                    <th>Goal Name</th>
                    <th>Priority</th>
            
                    <th>Level</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                 
                  
                   
                            
                   
                   
                    @foreach ($task as $key=>$item)
                          
                 
               
                 <tr>
                   <td>{{++$key}}</td>
                   <td>{{$item->title}}</td>
                   <td>{{$item->description}}</td>
                   <td>{{@$item->goal->title}}</td>
                   <td>{{$item->priority}}</td>
                   <td>{{$item->level}}</td>
                   <td>{{$item->status}}</td>
                 
                  
               
                   <td>
                    
                     <a href="{{route('task.edit',[$item])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                    
                   
                   
                     <form action="{{route('task.destroy',[$item])}}" method="POST">
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Name</th>
                    <th>Priority</th>
             
                    <th>Level</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                  
                  </tr>
                  </tfoot>
                </table>


                <div class="card direct-chat direct-chat-primary">
                  <div class="card-header">
                    <h3 class="card-title">Notification</h3>
      
                    <div class="card-tools">
                      <span title="3 New Messages" class="badge badge-primary">3</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">{{Auth::user()->name}}</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{asset('admin')}}/dist/img/user1-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                         @if (@$goalStatus >= 25 && $goalStatus < 50)
                             Great Start! Keep Doing
                         @elseif(@$goalStatus >= 50 && $goalStatus <75)
                             You are half way done!
                         @elseif(@$goalStatus >= 75 && $goalStatus <100)
                          You have almost reached the goal!
                          @elseif(@$goalStatus)
                          Congrats! You have reached your goal!!
                         @endif
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- /.direct-chat-msg -->
      
                    </div>
                    <!--/.direct-chat-messages-->
      
           
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                 
                  <!-- /.card-footer-->
                </div>
@if (Auth::user()->role == 'user')

                <div class="tab-content p-5 text-center">
                  <!-- Morris chart - Sales -->
                  <canvas id="myChart" style="max-height: 300px;max-width:300px"></canvas>
                  <br>
                  <canvas id="myChart2" style="max-height: 300px;max-width:300px"></canvas>

                </div>
    
                @endif
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: {!! json_encode(@$data['labels']) !!},
              datasets: [{
                  data: {!! json_encode(@$data['values']) !!},
                  backgroundColor: [
                      'rgb(255, 99, 132)',
                      'rgb(54, 162, 235)',
                      'rgb(255, 205, 86)'
                  ]
              }]
          },
          options: {}
      });
      </script>

      <script>
      var ctx = document.getElementById('myChart2').getContext('2d');
      var chart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: {!! json_encode(@$data2['labels']) !!},
              datasets: [{
                  data: {!! json_encode(@$data2['values']) !!},
                  backgroundColor: [
                      'rgb(255, 99, 132)',
                      'rgb(54, 162, 235)',
                      'rgb(255, 205, 86)'
                  ]
              }]
          },
          options: {}
      });
      </script>
@endsection