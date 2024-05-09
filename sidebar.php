<?php
$permi  =  $_SESSION['permission'] ;
?>
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="add_college_user.php" class="logo">Students <span> MS</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	          </li>
                <?php
                if($permi ==1)
                {
                ?>
	          <li>
	              <a href="addcollege.php"><span class="fa fa-user mr-3"></span>Add New College</a>
	              <a href="allcolleges.php"><span class="fa fa-user mr-3"></span>All Colleges</a>
	          </li>

              <li>
              <a href="add_college_user.php"><span class="fa fa-briefcase mr-3"></span> Add College User</a>
	          </li>

	          <li>
              <a href="college_managers.php"><span class="fa fa-briefcase mr-3"></span>  College Managers</a>
	          </li>
   <?php
                }
                else if($permi ==2)
                {
                ?>

	          <li>
              <a href="all_departments.php"><span class="fa fa-sticky-note mr-3"></span>  Departments </a>
	          </li>
              <li>
              <a href="add_new_dep.php"><span class="fa fa-sticky-note mr-3"></span> Add New Department </a>
	          </li>
	          <li>
              <a href="teachers.php"><span class="fa fa-suitcase mr-3"></span> Teachers</a>
	          </li>
                      <li>
              <a href="add_new_teacher.php"><span class="fa fa-suitcase mr-3"></span> Add New Teacher</a>
	          </li>
	          <li>
              <a href="students.php"><span class="fa fa-cogs mr-3"></span> Students</a>
	          </li>
                      <li>
              <a href="add_new_students.php"><span class="fa fa-cogs mr-3"></span> Add New Student</a>
	          </li>
                 <li>
              <a href="student_groups.php"><span class="fa fa-cogs mr-3"></span>  Students Groups</a>
	          </li>
   <?php
                }
                else if($permi ==4)
                {
                ?>
	          <li>
              <a href="te_all_lect.php"><span class="fa fa-paper-plane mr-3"></span> Lectures</a>
	          </li>
              <li>
              <a href="te_upload_lect.php"><span class="fa fa-paper-plane mr-3"></span> Add New Lecture</a>
	          </li>

                <?php
                }
                 else if($permi ==5)
                {
                ?>
	          <li>
              <a href="student_all_lecture.php"><span class="fa fa-paper-plane mr-3"></span> Lectures</a>
	          </li>


                <?php
                }
                ?>

                   <li>
              <a href="logout.php"><span class="fa fa-paper-plane mr-3"></span> Logout</a>
	          </li>
	        </ul>


	      </div>
    	</nav>