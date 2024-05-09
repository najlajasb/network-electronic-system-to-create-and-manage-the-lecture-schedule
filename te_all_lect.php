<!doctype html>
<?php
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
                    <th class="tabletext"> حذف</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        $results = $pdo->query( 'SELECT lecture.id as lec_id,lecture.name as lec_name,lecture.filename,lecture.stage,lecture.group_no, departments.name from lecture join departments on departments.id = lecture.department_id where lecture.user_id ="'.$user_id.'"' );
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
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $row['lec_id'] ?>" name="input2"/>
                                        <td><p data-placement="top" data-toggle="tooltip" title="عرض تفاصيبل الطالب"><input type="submit" name="delete" value="حذف" class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class=""></span></p></td>
                                </tr>
                                </form>
                                <?php
                            }
                        }
                        if(isset($_POST['delete']))
                        {
                            echo $_POST['input2'];
                            // $_SESSION['update_subjects'] = $_POST['input2'];
                            $results = $pdo->query( 'delete from lecture where id = "'.$_POST['input2'].'"' );
                            if($results)
                            {
                                echo '<script>alert("تم حذف المحاضرة بنجاح")</script>' ;
                                header('location:http://127.0.0.1/prog/te_all_lect.php');
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
                    <th class="tabletext"> حذف</th>
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