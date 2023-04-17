
@include('admin.sessionMsg')
<div class="card-body">

  <div class="form-group">
    <label for="exampleInputEmail1">Select Goal </label>
   
                    

    <select class="form-control" name="goal_id" id="dropdown">
      
      <option>Select goal</option>
        
      @foreach ($goal as $key => $value)
        <option value="{{ $value->id }}" {{ ( $value->id == @$edit->goal_id) ? 'selected' : '' }}> 
            {{ $value->title }} 
        </option>
      @endforeach    
    </select>
 
  </div>

<div class="form-group">
  <label for="exampleInputEmail1">Title <span style="color:red" >*</span></label>
 
  <input type="text" class="form-control" name="title" value="{!!old('title',@$edit->title)!!}">
  
</div>

<div class="form-group">
  <label for="exampleInputEmail1">description <span style="color:red" >*</span></label>
 
  <textarea name="description" id="general" cols="30" rows="10" class="form-control" >{!!old('description',@$edit->description)!!}</textarea>
 
</div>



<div class="form-group">
  <label for="exampleInputEmail1">Priority <span style="color:red" >*</span></label>
 
 
<select class="form-control" id="dropdown" name="priority">
                  
    <option>Select Priority</option>
     
                       <option value="high" {{ (   @$edit->priority == 'high') ? 'selected' : '' }}>
        High
      </option>
<option value="medium" {{ (   @$edit->priority == 'medium') ? 'selected' : '' }}>
        Medium
      </option>
<option value="low" {{ (   @$edit->priority == 'low') ? 'selected' : '' }}>
        Low
      </option>
  </select>
 
</div>



<div class="form-group">
    <label for="exampleInputEmail1">Level<span style="color:red" >*</span></label>
   
    
<select class="form-control" id="dropdown" name="level">
                  
  <option>Select Task Level</option>
   
                     <option value="hard" {{ (   @$edit->level == 'hard') ? 'selected' : '' }}>
      Hard
    </option>
<option value="moderate" {{ (   @$edit->level == 'moderate') ? 'selected' : '' }}>
      Moderate
    </option>
<option value="easy" {{ (   @$edit->level == 'easy') ? 'selected' : '' }}>
      Easy
    </option>
</select>
   
  </div>


  
<div class="form-group">
  <label for="exampleInputEmail1">Status<span style="color:red" >*</span></label>
 
  
<select class="form-control" id="dropdown" name="status">
                
<option>Select status</option>
 
                   <option value="done" {{ (   @$edit->status == 'done') ? 'selected' : '' }}>
    Done
  </option>
<option value="pending" {{ (   @$edit->status == 'pending') ? 'selected' : '' }}>
    Pending
  </option>
<option value="doing" {{ (   @$edit->status == 'doing') ? 'selected' : '' }}>
    Doing
  </option>
</select>
 
</div>
  

 


</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
