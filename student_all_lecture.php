<!doctype html>
<?php
error_reporting(0);

session_start();
error_reporting(0);
    if(!isset($_SESSION['STAFF_LOGIN']))
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
                        require 'pdo.php';

            ?>
        <!-- Page Content  -->

      <div id="content" class="p-4 p-md-5 pt-5">

    <div class="row d-flex justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-9 col-11 text-center ">
            <div class="card ">
                <h5 class="text-center mb-4">All Lecture </h5>

                <div class="col-md-12">
                    <table id="example" class="display" style="width:100%">
                 <thead>
                <tr>
                    <th class="tabletext">التسلسل </th>
                    <th class="tabletext">القسم </th>
                    <th class="tabletext"> المرحلة</th>
                    <th class="tabletext"> الكروب</th>
                    <th class="tabletext"> اسم المحاضرة</th>
                    <th class="tabletext"> رابط المحاضرة</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        $results = $pdo->query( 'SELECT lecture.id as lec_id,lecture.name as lec_name,lecture.filename,lecture.stage,lecture.group_no, departments.name 
                                                            from users,lecture join departments on departments.id = lecture.department_id where users.department_id = lecture.department_id and
                                                            users.stage = lecture.stage and users.group_no = lecture.group_no and users.id ="'.$user_id.'"' );
                        if($results)
                        {
                            foreach ( $results as $row) {
                                $link_address = 'http://127.0.0.1/prog/uploads/'. $row['filename'];
                                ?>
                                <tr>
                                    <td><?php echo   $row['lec_id']; ?></td>
                                    <td><?php echo   $row['name']; ?></td>
                                    <td><?php echo   $row['stage']; ?></td>
                                    <td><?php echo   $row['group_no']; ?></td>
                                    <td><?php echo   $row['lec_name']; ?></td>
                                    <td><?php echo "<a href='".$link_address."'>Click to Download</a>"; ?></td>
                               </tr>
                        <?php
                            }
                        }
                        ?>
                </tbody>
        <tfoot>
            <tr>
                 <th class="tabletext">التسلسل </th>
                    <th class="tabletext">القسم </th>
                    <th class="tabletext"> المرحلة</th>
                    <th class="tabletext"> الكروب</th>
                    <th class="tabletext"> اسم المحاضرة</th>
                    <th class="tabletext"> رابط المحاضرة</th>
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


          </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>