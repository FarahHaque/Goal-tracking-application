@extends('admin.layout.master')
@section('content')

  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Payment History</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment History</li>
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
          @php
              $month = Carbon\Carbon::now()->format('F');
          @endphp
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Payment History - {{$month}}
                  @if (Auth::user()->role == "user" && $payment->status == 1)
                  <span class="badge badge-primary"> Active </span>
                  @endif
                  
           </h3>
                
              @if (Auth::user()->role == "user" && $paymentCount < 1)
                  
       
                <a href="{{route('payment.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
                @endif
     
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Package</th>
                    <th>Card No</th>
                    <th>Transaction Id</th>
  
                    <th>Status</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                 
                  
                   
                            
                   
                 
                  @if (Auth::user()->role == "user" && $paymentCount >0)
                  <tr>
                   <td>1</td>
                   <td>{{@$payment->title}}</td>
                   <td>
                    @if ($payment->amount == "500")
                    500 BDT/month (max users-20)
                    @elseif($payment->amount == "1000")
                    1000 BDT/month (max users-50)
                    @elseif($payment->amount == "1300")
                    1300 BDT/month (max users-50+)
                    @else
                      Not Selected
                    @endif
                   </td>
                   <td>{{@$payment->card}}</td>
                   <td>{{@$payment->transaction_id}}</td>
                   <td>
                    @if ($payment->status == 1)
                      <span class="text-success">Paid</span>    
                    @else 
                    <span class="text-warning">Pending</span>    
                    @endif

                   </td>

                 <td>
                  <span class="badge badge-secondary">Not applicable</span>
                 </td>
    
                   <tr>
                   @else
                   @foreach ($payment as $key=>$item)
                       
           
                   <tr>
                   <td>{{++$key}}</td>
                   <td>{{@$item->title}}</td>
                   <td>
                    @if ($item->amount == "500")
                    500 BDT/month (max users-20)
                    @elseif($item->amount == "1000")
                    1000 BDT/month (max users-50)
                    @elseif($item->amount == "1300")
                    1300 BDT/month (max users-50+)
                    @else
                      Not Selected
                    @endif
                   </td>
                   <td>{{@$item->card}}</td>
                   <td>{{@$item->transaction_id}}</td>
                   <td>
                    @if ($item->status == 1)
                      <span class="text-success">Paid</span>    
                    @else 
                    <span class="text-warning">Pending</span>    
                    @endif

                   </td>

                 
                   <td>
                 
                        
                   
                 <a href="{{route('payment.approve',[$item->id])}}"><button class="btn btn-outline-success btn-sm"><i class="fas fa-check-square"></i></button></a>

                 
                 <a href="{{route('payment.disapprove',[$item->id])}}"><button class="btn btn-outline-danger btn-sm"><i class="fas fa-times-circle"></i></button></a>

                   </td>
                   <tr>
                    @endforeach
                 

                   @endif
                 </tr>




                
    

                  </tbody>
                  <tfoot>
                  <tr>
              
              
                    <th>#</th>
                    <th>Title</th>
                    <th>Package</th>
                    <th>Card No</th>
                    <th>Transaction Id</th>
  
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