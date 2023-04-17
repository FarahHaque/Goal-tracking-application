
@include('admin.sessionMsg')
<div class="card-body">



<div class="form-group">
  <label for="exampleInputEmail1">Name<span style="color:red" >*</span></label>
 
  <input type="text" class="form-control" name="name" value="{!!old('name',@$edit->name)!!}">
  
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Bio <span style="color:red" >*</span></label>
 
  <textarea name="bio" id="general" cols="30" rows="10" class="form-control" >{!!old('bio',@$edit->bio)!!}</textarea>
 
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Phone <span style="color:red" >*</span></label>
 
  <input type="text" class="form-control" name="phone" value="{!!old('phone',@$edit->phone)!!}">
 
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Designation <span style="color:red" >*</span></label>
  <input type="text" class="form-control" name="designation" value="{!!old('designation',@$edit->designation)!!}">
 

 
</div>


<div class="form-group">
  <label for="exampleInputEmail1">Birth Date <span style="color:red" >*</span></label>
 
  <input type="date" class="form-control" name="birthdate" value="{!!old('birthdate',@$edit->birthdate)!!}">
 
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Genger<span style="color:red" >*</span></label>
   
    <select class="form-control" id="dropdown" name="gender">
                  
      <option>Select Gender</option>
       
                         <option value="male" {{ (   @$edit->customer_info == 'male') ? 'selected' : '' }}>
          Male
        </option>
  <option value="female" {{ (   @$edit->customer_info == 'female') ? 'selected' : '' }}>
          Female
        </option>
  <option value="others" {{ (   @$edit->customer_info == 'others') ? 'selected' : '' }}>
          others
        </option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Country<span style="color:red" >*</span></label>
   
    <input type="text" class="form-control" name="country" value="{!!old('country',@$edit->country)!!}">
   
  </div>
  
 


</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
