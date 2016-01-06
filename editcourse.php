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

<!-- 链接数据库 -->
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

<?php
$id = intval($_GET['id']);

$courses = mysql_query("SELECT * FROM courses WHERE courseteacherId='$teacherId' AND id='$id'");
$courses_arr = mysql_fetch_assoc($courses);
$courseid = $courses_arr['id'];
$coursename = $courses_arr['coursename'];
$coursetime = $courses_arr['coursetime'];
$courseclassroom = $courses_arr['courseclassroom'];
$courseclass = $courses_arr['courseclass'];
$courseweek = $courses_arr['courseweek'];

?>


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
      <li role="presentation" class="active in"><a  aria-controls="course-infro" role="tab" data-toggle="tab" href="#addcourse">修改课程</a></li>
    </ul>
    </div>
    
    <div class="col-xs-9 .col-sm-9 .col-md-11 content">
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane personal-infro active" id="addcourse" >
          <form class="pi-box" action="php/editcourse4server.php" method="post">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">课程名称</span>
              <input type="text" placeholder="请填写课程全称（例：微积分）"  class="form-control" aria-describedby="sizing-addon2" value="<?php echo $courses_arr['coursename'];?>" name="coursename">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">上课周次</span>
              <input type="text" placeholder="请按规范填写（例：第一周至第十八周）" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $courses_arr['courseweek'];?>" name="courseweek">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">上课时间</span>
              <input placeholder="请按规范填写（例：周一3-4；周二4-5）" type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $courses_arr['coursetime'];?>" name="coursetime">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">学生专业</span>
              <input placeholder="请填写专业全称（例：通信工程）"  type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $courses_arr['coursemajor'];?>" name="coursemajor">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">上课班级</span>
              <input placeholder="一次添加一个班级，请填写数字（例：1305）"  type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $courses_arr['courseclass'];?>" name="courseclass">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">上课教室</span>
              <input placeholder="请按规范填写（例：东九D401）"  type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $courses_arr['courseclassroom'];?>" name="courseclassroom">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">教师工号</span>
              <input placeholder="请填写您的工号以确认您的身份"  type="text" class="form-control" aria-describedby="sizing-addon2" value="<?php echo $courses_arr['courseteacherId'];?>" name="courseteacherId">
            </div>
            <div class="btn-group btn-group-justified" role="group">
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
