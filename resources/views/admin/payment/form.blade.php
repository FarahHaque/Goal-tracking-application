
@include('admin.sessionMsg')
<div class="card-body">

<div class="form-group">
  <label for="exampleInputEmail1">Title <span style="color:red" >*</span></label>
 
  <input type="text" class="form-control" name="title" value="Monthly Subscription" readonly>
  <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
</div>




<div class="form-group">
  <label for="exampleInputEmail1">Card No. <span style="color:red" >*</span></label>
 
  <input type="text" class="form-control" name="card" value="{!!old('card',@$edit->card)!!}">
 
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Package<span style="color:red" >*</span></label>
   
    <select class="form-control" id="dropdown" name="amount">
                  
      <option>Select Package</option>
       
                         <option value="500" {{ (   @$edit->customer_info == '500') ? 'selected' : '' }}>
          500 BDT/month (max users-20)
        </option>
  <option value="1000" {{ (   @$edit->customer_info == '1000') ? 'selected' : '' }}>
    1000 BDT/month (max users-50)
        </option>
  <option value="1300" {{ (   @$edit->customer_info == '1300') ? 'selected' : '' }}>
    1300 BDT/month (max users-50+)
        </option>
    </select>
  </div>

  
<div class="form-group">
  <label for="exampleInputEmail1">Transaction No. <span style="color:red" >*</span></label>
 
  <input type="text" class="form-control" name="transaction_id" value="{!!old('transaction_id',@$edit->transaction_id)!!}">
 
</div>

</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
