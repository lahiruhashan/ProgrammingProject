
<div class="container">
     <div class="row">
        
        <div class="col-md-9 col-md-offset-2">
  <h2 class="add_cus">Add Customer</h2>

  <?php if ($this->session->flashdata('msg')){
      echo "<h3>".$this->session->flashdata('msg')."</h3>";
  } ?>

<?php echo validation_errors(); ?>

<?php echo form_open('AddCus/AddCustomer'); ?> 

<form class="form-group">

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="First Name" name="fname">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name" name="lname">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Address" name="address">
    </div>
  </div>

  <div class="form-group">
            <label class="col-sm-2 control-label" for="checkboxes" class="gender">Gender</label>

            <div class="col-sm-10">
                <div class="checkbox">
                    <label>
                        <input name="genderboxes" id="genderboxes-0" value="male" type="radio" checked>
                        Male
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="genderboxes" id="genderboxes-1" value="female" type="radio">
                        Female
                    </label>
                </div>
            </div>
  </div>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Birth Day</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputEmail3" placeholder="Birth Day" name="bday">
    </div>
  </div>

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Phone Number" name="pnumber">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="Password" class="form-control" id="inputEmail3" placeholder="Password" name="password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>

</form>

</div>

<?php echo form_close(); ?>
