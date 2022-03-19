<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
  <?php $validation =  \Config\Services::validation(); ?>
    <?php //echo $validation->listErrors() ?>

    <?php //echo form_open('form'); ?>
    <form method="post" id="add_create" name="add_create" 
    action="<?= site_url('/submit-form') ?>">
      <div class="form-group">
        <label name = "name">Name</label>
        <label style="color:red"><?= $validation->getError('name'); ?></label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <label style="color:red"><?= $validation->getError('email'); ?></label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Phone</label>
        <label style="color:red"><?= $validation->getError('phone'); ?></label>
        <input type="tel" name="phone" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Mobile</label>
        <label style="color:red"><?= $validation->getError('mobile'); ?></label>
        <input type="tel" name="mobile" class="form-control" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Create User</button>
        <a href = "<?php echo site_url('/login') ;?>"class="btn btn-link btn-block">Admin Login</a>
      </div>
    </form>
    <?php // $validation =  \Config\Services::validation(); ?>
    <?php // $validation->listErrors() ?>

    <?php //echo form_open('form'); ?>
<!-- 
    <h5>Username</h5>
    <input type="text" name="username" value="" size="50" />

    <h5>Password</h5>
    <input type="text" name="password" value="" size="50" />

    <h5>Password Confirm</h5>
    <input type="text" name="passconf" value="" size="50" />

    <h5>Email Address</h5>
    <input type="text" name="email" value="" size="50" />

    <div><input type="submit" value="Submit" /></div>

    </form> -->

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
          phone: {
            // matches: '[0-9\-\(\)\s]+',//"[0-9]+",  // <-- no such method called "matches"!
            minlength:10,
            maxlength:10
          },
          mobile: {
            // matches: '[0-9\-\(\)\s]+',//"[0-9]+",  // <-- no such method called "matches"!
            minlength:10,
            maxlength:10
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
          phone: {
            required: "Phone is required.",
            phone: "It does not seem to be a valid phone.",
            maxlength: "The phone should be or equal to 10 chars.",
          },
          mobile: {
            required: "Mobile is required.",
            mobile: "It does not seem to be a valid mobile.",
            maxlength: "The mobile should be or equal to 10 chars.",
          },
        },
      })
    }
  </script>
</body>
</html>