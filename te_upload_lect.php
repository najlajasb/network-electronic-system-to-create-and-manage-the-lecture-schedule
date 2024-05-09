<!doctype html>
<?php
   ob_start();
    session_start();
$user_id ="";
    if(!($_SESSION['STAFF_LOGIN']))
 {
    header('location:login.php');
 }
    else
    {
        $user_id = $_SESSION['user_id'];
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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
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
                <h5 class="text-center mb-4">Upload New Lecture </h5>
                <form class="form-card m-4" method="post" enctype="multipart/form-data">

                           <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Choose Department<span class="text-danger"> *</span></label>
                        <select class="form-control bg-light" name="department_id" id="subjects" for="inlineFormInput">

                            <?php
                            require 'pdo.php';
                            $results = $pdo->query( 'SELECT * FROM departments' );
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
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Choose level<span class="text-danger"> *</span></label>
                        <select class="form-control bg-light" name="stage" id="subjects" for="inlineFormInput">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        </div>
                    </div>


                      <div class="row justify-content-between text-left">

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Groups<span class="text-danger"> *</span></label>
                        <select class="form-control bg-light" name="group_no" id="subjects" for="inlineFormInput">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                            <option>F</option>
                            <option>G</option>

                        </select>
                    </div>
                             <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Lecture Title<span class="text-danger"> *</span></label> <input type="text" id="lecture_title" name="lecture_title" placeholder="Enter your first name" onblur="validate(1)"> </div>

                    </div>


                      <div class="row justify-content-between text-left">

                    <label for="email">choose file   </label> <span id="healthfile-error" class="help-inline" style="color: #FF3300; font-size:18px; margin-right: 1%;"></span>
		<input type="file" style="font-size: 20px;" class="form-control" name="healthfile" id="healthfile" for="inlineFormInput" >
                    </div>



                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" name="submit" class="btn-block btn-primary">Add</button> </div>
                    </div>
                </form>

            </div>
        </div>


    </div>
<br>

            <?php

              if(isset($_POST['submit'])) {

                  $folder_path = 'uploads/';

                  $filename = basename($_FILES['healthfile']['name']);
                  echo '<script language="javascript">';
                  echo 'alert("' . $filename . '")';
                  echo '</script>';
                  $newname = $folder_path . $filename;

                  echo '<script language="javascript">';
                  echo 'alert("' . $newname . '")';
                  echo '</script>';

                  $FileType = pathinfo($newname, PATHINFO_EXTENSION);

                  if ($FileType == "pdf") {
                      if (move_uploaded_file($_FILES['healthfile']['tmp_name'], $newname)) {
                          $lec_title = $_POST['lecture_title'];
                          $department_id = $_POST['department_id'];
                          $stage = $_POST['stage'];
                          $group_no = $_POST['group_no'];


                          $fileresult = $pdo->query("INSERT INTO lecture(name, filename,stage,group_no,user_id,department_id) 
                                                VALUES('" . $lec_title . "','" . $filename . "','" . $stage . "','" . $group_no . "','" . $user_id . "','" . $department_id . "')");


                          if (isset($fileresult)) {

                              echo '<script language="javascript">';
                              echo 'alert("تم تحميل المحاضرة بنجاح")';
                              echo '</script>';
                          } else {

                              echo '<script language="javascript">';
                              echo 'alert("حدث خطا يرجى اعادة المحاولة")';
                              echo '</script>';
                          }
                      } else {

                          echo '<script language="javascript">';
                          echo 'alert("يرجى اختاير ملف حجمه اقل من 5 ميجا")';
                          echo '</script>';
                      }


                  } else {
                      echo '<script language="javascript">';
                      echo 'alert("يجب ان يكون الملف على شكل  PDF")';
                      echo '</script>';
                  }
              }


    ?>
          </div>
		</div
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>