<?php include "patial/header.php";?>

<div class="container">
<div class="col-md-9 col-md-offset-2">
<h2>View Customer</h2>
<?php echo validation_errors(); ?>

<?php echo form_open('ViewCus/ViewCustomer'); ?> 

<form class="form-horizontal">
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="<?php $issetCustomer = isset($customer);
  if($issetCustomer){echo $customer[0]['email'];} ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">SEARCH</button>
    </div>
  </div>
  <?php 
  $issetCustomer = isset($customer);
  if($issetCustomer){
    ?>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="First Name" value="<?php echo $customer[0]['fname']; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name" value="<?php echo $customer[0] ['lname']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Address" value="<?php echo $customer[0]['address']; ?>">
    </div>
  </div>

  <div class="form-group">
            <label class="col-sm-2 control-label" for="checkboxes" value="<?php echo $customer[0]['gender']; ?>">Gender</label>

            <div class="col-sm-10">
                <div class="checkbox">
                    <label>
                        <input name="genderboxes" id="genderboxes-0" value="0" type="radio">
                        Male
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="genderboxes" id="genderboxes-1" value="1" type="radio">
                        Female
                    </label>
                </div>
            </div>
  </div>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Birth Day</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Birth Day" value="<?php echo $customer[0] ['bday']?>">
    </div>
  </div>

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" value="<?php echo $customer[0]['pnumber']; ?>">Phone Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Phone Number" value="<?php echo $customer[0] ['pnumber']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo $customer[0]['password']; ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="ViewCus/DeleteCustomer">
      <button type="submit" class="btn btn-default">DELETE</button></a>
    </div>
  </div>
  <?php } ?>

<?php echo form_close(); ?>

</form>
</div>

<?php include "patial/footer.php";?>
