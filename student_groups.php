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
                <h5 class="text-center mb-4">Students Groups </h5>
                <form class="form-card m-4" method="post">

                           <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Choose Department<span class="text-danger"> *</span></label>
                        <select class="form-control bg-light" name="department_id" id="subjects" for="inlineFormInput">

                            <?php
                            require 'pdo.php';
                            $results = $pdo->query( 'SELECT * FROM departments where college_id =  "'. $_SESSION['college_id'].'"' );
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
                    </div>



                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" name="submit" class="btn-block btn-primary">Search</button> </div>
                    </div>
                </form>

            </div>
        </div>


    </div>
<br>

            <?php

            if(isset($_POST['submit']))
            {
                require 'PHPclass.php';
                $object2 = new phptestcodeclass();
                $department =  $_POST['department_id'];
                $group_no =  $_POST['group_no'];
                $stage =  $_POST['stage'];
                ?>
<div class="row d-flex justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-9 col-11 text-center ">
            <div class="card ">
                <h5 class="text-center mb-4">All students </h5>

                <div class="col-md-12">
                    <table id="example" class="display" style="width:100%">
                 <thead>
                <tr>
                    <th class="tabletext">التسلسل </th>
                    <th class="tabletext">اسم المستخدم</th>
                    <th class="tabletext">الصلاحية </th>
                    <th class="tabletext">الايميل </th>
                    <th class="tabletext">الكلية </th>
                    <th class="tabletext">القسم </th>
                    <th class="tabletext">المرحلة </th>
                    <th class="tabletext">الكروب </th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        $results = $pdo->query( 'SELECT users.group_no as st_go, users.stage as st_stage ,users.id, users.name, users.email, colleges.name AS college_name , permissions.name as permission, departments.name as dep_name FROM users JOIN colleges ON users.college_id = colleges.id join permissions on permissions.id = users.permission join departments on departments.id = users.department_id where users.permission = 5 
                                                        and department_id = "'.$department.'"  and group_no="'.$group_no.'"   and stage ="'.$stage.'"');
                        if($results)
                        {
                            foreach ( $results as $row) {
                                ?>
                                <tr>
                                    <td><?php echo   $row['id']; ?></td>
                                    <td><?php echo   $row['name']; ?></td>
                                    <td><?php echo   $row['permission']; ?></td>
                                    <td><?php echo   $row['email']; ?></td>
                                    <td><?php echo   $row['college_name']; ?></td>
                                    <td><?php echo   $row['dep_name']; ?></td>
                                                                        <td><?php echo   $row['st_stage']; ?></td>
                                    <td><?php echo   $row['st_go']; ?></td>
                                         </tr>

                                <?php
                            }
                        }
                        ?>
                </tbody>
        <tfoot>
            <tr>
                        <th class="tabletext">التسلسل </th>
                    <th class="tabletext">اسم المستخدم</th>
                    <th class="tabletext">الصلاحية </th>
                    <th class="tabletext">الايميل </th>
                    <th class="tabletext">الكلية </th>
                    <th class="tabletext">القسم </th>
                    <th class="tabletext">المرحلة </th>
                    <th class="tabletext">الكروب </th>
            </tr>
        </tfoot>
    </table>
                </div>
      <script>
          new DataTable('#example', {
    layout: {
        bottomEnd: {
            paging: {
                boundaryNumbers: false
            }
        }
    }
});
      </script>
            </div>
        </div>
    </div>
          <?php
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