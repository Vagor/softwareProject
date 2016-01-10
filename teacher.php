<?php
header('Content-type: text/html;charset=utf-8'); 

session_start();
if(!isset($_SESSION['userid_t'])){
    header('location:login.html');
    exit();
}

//连接数据库
require_once './php/fun.php';
$conn = connectDB();
mysql_query("SET NAMES UTF8"); 


$userid_t = $_SESSION['userid_t'];

$teacher_info = mysql_query("SELECT * FROM teachers WHERE id='$userid_t'");

$teacher_info_arr = mysql_fetch_assoc($teacher_info);
$id = $teacher_info_arr['id'];
$name = $teacher_info_arr['name'];
$telephone = $teacher_info_arr['telephone'];
$email = $teacher_info_arr['email'];
$college = $teacher_info_arr['college'];
$teacherId = $teacher_info_arr['teacherId'];
$password = $teacher_info_arr['password'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/teacher.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/rem.js"></script>
  <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/teacher.js"></script>
  <title>电信学院课程综合系统</title>
</head>

<body>
  <div class="container-fluid main-page">
    <div class="col-xs-3 .col-sm-3 .col-md-1 sidebar">
      <div class="personal-info" style="position: relative">
        <img class="avatar" src="images/avatar.png" height="50">
        <div class="personal-info-r">
          <p class="name"><?php echo $name;?></p>
          <p><?php echo $college;?></p>
          <a href="logout.php?action=logout" style="position: absolute;bottom: 5px;right: 10px;">注销</a>
        </div>
      </div>
    <ul class="nav nav-pills nav-stacked" role="tablist">
      <li role="presentation" class="active in"><a  aria-controls="course-infro" role="tab" data-toggle="tab" href="#courseInfro">查看授课信息</a></li>
      <li role="presentation"><a  aria-controls="downloads" role="tab" data-toggle="tab" href="#personalInfro">修改个人信息</a></li>
    </ul>
    </div>
    
    <div class="col-xs-9 .col-sm-9 .col-md-11 content">
      <div class="tab-content">
      <!-- 查看授课信息 -->
        <div role="tabpanel" class="course-infro tab-pane active" id="courseInfro">
          <h2 class="course-title">查看授课信息</h2>
          <table class="table table-striped" >
            <thead>
              <tr class="success">
                <th>课程名</th>
                <th>上课时间</th>
                <th>上课教室</th>
                <th>上课周次</th>
                <th>上课班级</th>
                <th><a href="addcourse.php">添加课程</a></th>
              </tr>
            </thead>
            <tbody>
            <?php

              $courses = mysql_query("SELECT * FROM courses WHERE courseteacherId='$teacherId'");
              $courses_count = mysql_num_rows($courses);

              for ($i=0; $i < $courses_count ; $i++) {
                  $courses_arr = mysql_fetch_assoc($courses);
                  $courseid = $courses_arr['id'];
                  $coursename = $courses_arr['coursename'];
                  $coursetime = $courses_arr['coursetime'];
                  $courseclassroom = $courses_arr['courseclassroom'];
                  $courseclass = $courses_arr['courseclass'];
                  $courseweek = $courses_arr['courseweek'];

                  echo "<tr><td>$coursename</td><td>$coursetime</td><td>$courseclassroom</td><td>$courseweek</td><td>$courseclass</td><td><a href='editcourse.php?id=$courseid'>修改</a> <a href='php/delcourse4server.php?id=$courseid'>删除</a><input type='file' value='上传课件'></td></tr>";
              }
            ?>
            </tbody>
          </table>
        </div>

      <!-- 修改个人信息 -->
        <div role="tabpanel" class="tab-pane personal-infro" id="personalInfro">
          <form class="pi-box" action="php/editteacher4server.php" method="post">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">姓名</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="name"  value="<?php echo $teacher_info_arr['name'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">学院</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="college" value="<?php echo $teacher_info_arr['college'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">邮箱</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="email" value="<?php echo $teacher_info_arr['email'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">手机</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="telephone" value="<?php echo $teacher_info_arr['telephone'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">工号</span>
              <input type="text" class="form-control" aria-describedby="sizing-addon2" name="teacherId" value="<?php echo $teacher_info_arr['teacherId'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">密码</span>
              <input type="password" class="form-control" aria-describedby="sizing-addon2" name="password" value="<?php echo $teacher_info_arr['password'];?>">
            </div>
            <div class="btn-group btn-group-justified" role="group">
              <div class="btn-group" role="group">
              <button type="button" class="btn btn-default">重置</button>
              </div>
              <div class="btn-group" role="group">
                <input type="submit" class="btn btn-default" value="确认修改">
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
</body>
</html>
