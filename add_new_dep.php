<!doctype html>
<?php
   ob_start();
    session_start();

    if(!($_SESSION['STAFF_LOGIN']))
 {
    header('location:login.php');
 }
?>
<html lang="en">
  <head>
  	<title>Sidebar 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
      <style>

      </style>
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">

            <?php
            require 'sidebar.php';
            ?>
        <!-- Page Content  -->





      <div id="content" class="p-4 p-md-5 pt-5">

    <div class="row d-flex justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <h5 class="text-center mb-4">Add New User </h5>
                <form class="form-card m-4" method="post">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3"> Department Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)"> </div>
                    </div>
                           <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Choose College<span class="text-danger"> *</span></label>
                        <select class="form-control bg-light" name="college_id" id="subjects" for="inlineFormInput">

                            <?php
                            require 'pdo.php';
                            $results = $pdo->query( 'SELECT * FROM colleges where id =  "'. $_SESSION['college_id'].'"'  );
                            if($results)
                            {
                                foreach ( $results as $row) {

                                    ?>
                                    <?php echo '<option value="'.$row['id'].'">'. $row['name'].'</option>' ?>

                                    <?php
                                }
                            }
                            ?>

                        </select>
                        </div>
                    </div>



                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" name="submit" class="btn-block btn-primary">Add</button> </div>
                    </div>
                </form>

                      <?php

            if(isset($_POST['submit']))
            {
                require 'PHPclass.php';
                $object2 = new phptestcodeclass();
                $fullname =  $_POST['fname'];
                $college =  $_POST['college_id'];

                $update_records =  [
                    'name'  => $fullname,
                    'college_id'  => $college
                ];
                $query= $object2->insert($pdo,'departments',$update_records);
                if($query)
                {
                    //   var_dump($update_records);
                    echo "<script>alert('تمت العملية بنجاح');</script>";
                    //   header('location:dep.php');
                }
            }
            ?>
            </div>
        </div>
    </div>


          </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>