
@include('admin.sessionMsg')
<div class="card-body">



<div class="form-group">
  <label for="exampleInputEmail1">Title <span style="color:red" >*</span></label>
 
  <input type="text" class="form-control" name="title" value="{!!old('title',@$edit->title)!!}">
  <input type="hidden" name="user_id"  value="{{Auth::user()->id}}" >
</div>

<div class="form-group">
  <label for="exampleInputEmail1">description <span style="color:red" >*</span></label>
 
  <textarea name="description" id="general" cols="30" rows="10" class="form-control" >{!!old('description',@$edit->description)!!}</textarea>
 
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Target Date <span style="color:red" >*</span></label>
 
  <input type="date" class="form-control" name="target_date" value="{!!old('target_date',@$edit->target_date)!!}">
 
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Priority <span style="color:red" >*</span></label>
 
 
<select class="form-control" id="dropdown" name="priority">
                  
    <option>Select Priority</option>
     
                       <option value="high" {{ (   @$edit->customer_info == 'high') ? 'selected' : '' }}>
        High
      </option>
<option value="medium" {{ (   @$edit->customer_info == 'medium') ? 'selected' : '' }}>
        Medium
      </option>
<option value="low" {{ (   @$edit->customer_info == 'low') ? 'selected' : '' }}>
        Low
      </option>
  </select>
 
</div>


<div class="form-group">
  <label for="exampleInputEmail1">Task Amount <span style="color:red" >*</span></label>
 
  <input type="text" class="form-control" name="task_amount" value="{!!old('task_amount',@$edit->task_amount)!!}">
 
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Goal Type<span style="color:red" >*</span></label>
   
    <input type="text" class="form-control" name="type" value="{!!old('type',@$edit->type)!!}">
   
  </div>
  
 


</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
