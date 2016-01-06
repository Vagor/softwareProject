<?php
header('Content-type: text/html;charset=utf-8'); 

session_start();
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//连接数据库
require_once './php/fun.php';
$conn = connectDB();
mysql_query("SET NAMES UTF8"); 


$userid = $_SESSION['userid'];

$student_info = mysql_query("SELECT * FROM students WHERE id='$userid'");

$student_info_arr = mysql_fetch_assoc($student_info);
$id = $student_info_arr['id'];
$name = $student_info_arr['name'];
$major = $student_info_arr['major'];
$class = $student_info_arr['class'];
$college = $student_info_arr['college'];
$stuid = $student_info_arr['stuid'];
$password = $student_info_arr['password'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/student.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/rem.js"></script>
  <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/student.js"></script>
  <title>电信学院课程综合系统</title>
</head>
<body>
  <div class="container-fluid main-page">
    <div class="col-xs-3 .col-sm-3 .col-md-1 sidebar">
      <div class="personal-info"  style="position: relative">
        <img class="avatar" src="images/avatar.png" height="50">
        <div class="personal-info-r">
          <p class="name"><?php echo $name;?></p>
          <p><?php echo $major;?></p>
          <a href="logout.php?action=logout" style="position: absolute;bottom: 5px;right: 10px;">注销</a>
        </div>
      </div>
    <ul class="nav nav-pills nav-stacked" role="tablist"  >
      <li role="presentation" class="active in"><a  aria-controls="ct-weekly" role="tab" data-toggle="tab" href="#ctWeekly">按周查看课表</a></li>
      <li role="presentation"><a  aria-controls="ct-yearly" role="tab" data-toggle="tab" href="#ctYearly">按年查看课表</a></li>
      <li role="presentation"><a  aria-controls="downloads" role="tab" data-toggle="tab" href="#downloads">下载课程资源</a></li>
      <li role="presentation"><a  aria-controls="downloads" role="tab" data-toggle="tab" href="#personalInfro">修改个人信息</a></li>
    </ul>
    </div>
    
    <div class="col-xs-9 .col-sm-9 .col-md-11 content">
      <div class="tab-content">

      <!-- 按周查看课表 -->
        <div role="tabpanel" class="ct-weekly tab-pane active" id="ctWeekly">
          <h2 class="course-title">课程表</h2>
          <select>
            <option value="">第1周</option>
            <option value="">第2周</option>
            <option value="">第3周</option>
            <option value="">第4周</option>
            <option value="">第5周</option>
            <option value="">第6周</option>
            <option value="">第7周</option>
            <option value="">第8周</option>
            <option value="">第9周</option>
            <option value="">第10周</option>
            <option value="">第11周</option>
            <option value="">第12周</option>
            <option value="">第13周</option>
            <option value="">第14周</option>
            <option value="">第15周</option>
            <option value="">第16周</option>
            <option value="">第17周</option>
            <option value="">第18周</option>
            <option value="">第19周</option>
            <option value="">第20周</option>
          </select>
          <table class="table table-striped" >
            <thead>
              <tr class="success">
                <th>星期1</th>
                <th>星期2</th>
                <th>星期3</th>
                <th>星期4</th>
                <th>星期5</th>
                <th>星期6</th>
                <th>星期7</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>微积分</td>
                <td>体育</td>
                <td>大学计算机基础</td>
                <td>／</td>
                <td>微积分</td>
                <td>／</td>
                <td>／</td>
              </tr>
              <tr>
                <td>微积分</td>
                <td>体育</td>
                <td>大学计算机基础</td>
                <td>／</td>
                <td>微积分</td>
                <td>／</td>
                <td>／</td>
              </tr>
              <tr>
                <td>／</td>
                <td>／</td>
                <td>／</td>
                <td>大学英语</td>
                <td>通信电子线路</td>
                <td>／</td>
                <td>／</td>
              </tr>
              <tr>
                <td>／</td>
                <td>／</td>
                <td>／</td>
                <td>大学英语</td>
                <td>通信电子线路</td>
                <td>／</td>
                <td>／</td>
              </tr>
              <tr>
                <td>电路理论</td>
                <td>通信电子线路</td>
                <td>电路理论</td>
                <td>大学物理</td>
                <td>／</td>
                <td>／</td>
                <td>基础韩语</td>
              </tr>
              <tr>
                <td>电路理论</td>
                <td>通信电子线路</td>
                <td>电路理论</td>
                <td>大学物理</td>
                <td>／</td>
                <td>／</td>
                <td>基础韩语</td>
              </tr>
              <tr>
                <td>大学物理</td>
                <td>／</td>
                <td>／</td>
                <td>／</td>
                <td>／</td>
                <td>／</td>
                <td>基础韩语</td>
              </tr>
              <tr>
                <td>大学物理</td>
                <td>／</td>
                <td>／</td>
                <td>／</td>
                <td>／</td>
                <td>／</td>
                <td>基础韩语</td>
              </tr>
            </tbody>
          </table>
        </div>


      <!-- 按年查看课表 -->
        <div role="tabpanel" class="ct-yearly tab-pane" id="ctYearly">
          <h2 class="course-title">年度课程表</h2>
          <table class="table table-striped" >
            <thead>
              <tr class="success">
                <th>课程名</th>
                <th>上课时间</th>
                <th>上课教室</th>
                <th>上课周次</th>
                <th>上课老师</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $courses = mysql_query("SELECT * FROM courses WHERE courseclass='$class' AND coursemajor='$major'");
              $courses_count = mysql_num_rows($courses);


              for ($i=0; $i < $courses_count ; $i++) {
                  $courses_arr = mysql_fetch_assoc($courses);
                  $id = $courses_arr['id'];
                  $coursename = $courses_arr['coursename'];
                  $coursetime = $courses_arr['coursetime'];
                  $courseclassroom = $courses_arr['courseclassroom'];
                  $courseteacherId = $courses_arr['courseteacherId'];
                  $courseweek = $courses_arr['courseweek'];


                  $courseteacher = mysql_query("SELECT * FROM teachers WHERE teacherId='$courseteacherId'");
                  $courseteacher_arr = mysql_fetch_assoc($courseteacher);
                  $teacherName = $courseteacher_arr['name'];


                  echo "<tr><td>$coursename</td><td>$coursetime</td><td>$courseclassroom</td><td>$courseweek</td><td>$teacherName</td></tr>";
              }
              ?>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table>
        </div>


      <!-- 下载课程资源 -->
        <div role="tabpanel" class="downloads tab-pane" id="downloads">
          <h2 class="">微积分</h2>
          <select> 
            <option selected="">微积分</option> 
            <option>大学物理</option> 
            <option>电路理论</option> 
            <option>大学计算机基础</option> 
            <option>基础英语</option> 
          </select> 
          <div class="input-group">
            <input type="text" class="form-control" value="微积分第一章PPT" disabled="">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">下载</button>
            </span>
          </div>
          <div class="input-group">
            <input type="text" class="form-control" value="微积分第一章课后习题" disabled="">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">下载</button>
            </span>
          </div>
          <div class="input-group">
            <input type="text" class="form-control" value="微积分第二张PPT" disabled="">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">下载</button>
            </span>
          </div>
          <div class="input-group">
            <input type="text" class="form-control" value="微积分第二章课后习题" disabled="">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">下载</button>
            </span>
          </div>
          <div class="input-group">
            <input type="text" class="form-control" value="微积分第三章PPT" disabled="">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">下载</button>
            </span>
          </div>
          <div class="input-group">
            <input type="text" class="form-control" value="微积分第三章课后习题" disabled="">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">下载</button>
            </span>
          </div>

        </div>

      <!-- 修改个人信息 -->
        <div role="tabpanel" class="tab-pane personal-infro" id="personalInfro">
          <form class="pi-box" action="./php/editstudent4server.php" method="post">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">姓名</span>
              <input name="name" type="text" class="form-control" aria-describedby="sizing-addon2" placeholder="请填写中文姓名" value="<?php echo $student_info_arr['name'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">专业</span>
              <input name="major" type="text" class="form-control" aria-describedby="sizing-addon2" placeholder="填写完整名称（例：通信工程）" value="<?php echo $student_info_arr['major'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">班级</span>
              <input name="class" type="text" class="form-control" aria-describedby="sizing-addon2" placeholder="填写数字（例：1305）" value="<?php echo $student_info_arr['class'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">学号</span>
              <input name="stuid" type="text" class="form-control" aria-describedby="sizing-addon2" placeholder="" value="<?php echo $student_info_arr['stuid'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">学院</span>
              <input name="college" type="text" class="form-control" aria-describedby="sizing-addon2" placeholder="" value="<?php echo $student_info_arr['college'];?>">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">密码</span>
              <input name="password" type="password" class="form-control" aria-describedby="sizing-addon2" placeholder="" value="<?php echo $student_info_arr['password'];?>">
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
