<?php session_start(); ?>
<?php require_once('inc1/connection.php'); ?>
<?php 

  

  $errors = array();
  
  $event_year = '';
  $user_name = '';
  $email = '';
  $passwor = '';
  $r_password = '';
  $tel_no = '';
  $pro_type = '';


  if (isset($_POST['submit'])) {
      // checking required fields

    $event_year = $_POST['event_year'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $r_password = $_POST['r-password'];
    $tel_no = $_POST['tel_no'];
    $pro_type = $_POST['pro_type'];


    $req_fields = array('event_year','user_name','email','password','r-password','tel_no');

    // checking required fields
    foreach ($req_fields as $field) {
      if (empty(trim($_POST[$field]))) {
        $errors[]= $field.' is required';
      }
    }
    // check max length
    $max_len_fields = array('event_year'=>4,'user_name'=>100,'email'=>100,'password'=>40,'r-password'=>40,'tel_no'=>10);

    foreach ($max_len_fields as $field => $max_len) {
      if (strlen(trim($_POST[$field])) > $max_len) {
        $errors[]= $field.' must be less then '. $max_len.' characters.';
      }
    }

    // chaecking if index already exists
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
      if (mysqli_num_rows($result_set) == 1) {
        $errors[] = 'Email adrres already exists';
      }
    }

    if ($password != $r_password) {
      $errors[] = 'Two passwords are not machin';
    }

    if (empty($errors)) {
      // no errors found... adding new record
      $event_year = mysqli_real_escape_string($connection,$_POST['event_year']);
      $user_name = mysqli_real_escape_string($connection,$_POST['user_name']);
      $email = mysqli_real_escape_string($connection,$_POST['email']);
      $password = mysqli_real_escape_string($connection,$_POST['password']);
      $tel_no = mysqli_real_escape_string($connection,$_POST['tel_no']);

      $hashed_password = sha1($password);

      $query = "INSERT INTO user (";
      $query .= "event_year, user_name, email, password, tele_no, profile_type, is_deleted";
      $query .= ") VALUE (";
      $query .= "{$event_year}, '{$user_name}', '{$email}', '{$hashed_password}', {$tel_no},'{$pro_type}', 0";
      $query .= ")";

      $result = mysqli_query($connection,$query);

      if ($result) {
        // query successfull.... redireting to modify-admin page
        header('Location:signup.php?admin_added=true');
      }else{
        $errors[] = 'Failed to add the new record.';
      }
    }

  } 

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main1.css">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div >
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="signup.php">
              <h1>Signup User</h1>
              
              
              <main>
                <form action="signup.php" method="post" class="userform">
                  
                  <?php 
                    if (!empty($errors)) {
                      echo '<div style="color:red; margin-left:10px;">';
                      echo '<b>There were Error(s) on your form <br></b>';
                      foreach ($errors as $error) {
                        echo $error.'<br>';
                      }
                      echo '</div>';
                    }
                  ?>

                  <p>
                    <label for="" class="enter_d" style="margin-left: 60px;">Event Year:</label>
                    <input type="text" name="event_year" placeholder="Event Year" style="width: 20%; margin-left: 20px; height: 30px; font-size: 20px;" <?php echo 'value="' .$event_year. '"'; ?>>
                  </p>

                  <p>
                    <label for="" class="enter_d" style="margin-left: 60px;">User Name:</label>
                    <input type="text" name="user_name" placeholder="User name" style="width: 20%; margin-left: 20px; height: 30px; font-size: 20px;" <?php echo 'value="' .$user_name. '"'; ?>>
                  </p>

                  <p>
                    <label for="" class="enter_d" style="margin-left: 110px;">Email:</label>
                    <input type="email" name="email" placeholder="Email" style="width: 20%; margin-left: 20px; height: 30px; font-size: 20px;" <?php echo 'value="' .$email. '"'; ?>>
                  </p>
                  
                  <p>
                    <label for="" class="enter_d" style="margin-left: 70px;">Password:</label>
                    <input type="password" name="password" placeholder="Password" style="width: 20%; margin-left: 20px; height: 30px; font-size: 20px;" >
                  </p>

                  <p>
                    <label for="" class="enter_d" style="margin-left: -15px;">Re-Enter Password:</label>
                    <input type="password" name="r-password" placeholder="R-Password" style="width: 20%; margin-left: 20px; height: 30px; font-size: 20px;"> 
                  </p>

                  <p>
                    <label for="" class="enter_d" style="margin-left: 100px;">Tel_no:</label>
                    <input type="text" name="tel_no" placeholder="Tel_no" style="width: 20%; margin-left: 20px; height: 30px; font-size: 20px;" <?php echo 'value="' .$tel_no. '"'; ?>> 
                  </p>

                  <p>
                    <label for="" class="enter_d" style="margin-left: 50px;">Profile Type: </label>  
                    <select name="pro_type" style="width: 20%; margin-left: 20px; height: 30px; font-size: 20px;">
                      <option value="leader">Group Leader</option>
                      <option value="member">Group Member</option>
                    </select>
                  </p>
                  
                  <div>
                  <p>
                    <label for="">&nbsp;</label>
                    <button type="submit" name="submit" class="btn btn-success submit" style="margin-top: 70px; font-size: 25px;">save</button>
                  </p>
                  </div>

                  <div>
                    <p>
                      <label for="">&nbsp;</label>
                      <a href="index.php" style="font-size: 30px;">Login</a>
                    </p>
                  </div> 

                  <!-- <button class="button">Click Me</button> -->

                </form>

              </main>


              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> ICTER EVENT PLANNER</h1>
                  <p>©2016 All Rights Reserved.By University of Colombo School of Computing</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>