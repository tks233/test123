<!DOCTYPE html>
<html lang="en">
<head>
	
<?php 
require_once('./connection.php');
 ?>
	<meta charset="UTF-8">
	<title>212管理員登入</title>
</head>
<body>
<form action="admin.php" method="post" enctype="multipart/form-data">
  <p>物品名稱: <input type="text" name="itemname" /></p>
  <p>描述: <input type="text" name="describe" /></p>
  <p>上傳照片：<input id="file" name="file" type="file">
  <p>遺失時間 :<input type="date" name="date" /></p>
  <p>已領/未領:<select name="iftaken" id="">
	  <option value="1">已領</option>
	  <option value="0">未領</option>
  </select>
  </p>
  <input id="submit" name="submit" type="submit" value="開始上傳">
</form>


</body>
</html>

<?php 
	if(isset($_POST["itemname"])&&isset($_POST["describe"])&&isset($_POST["iftaken"]))
{
move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$_FILES['file']['name']);//複製檔案
echo '<a href="file/'.$_FILES['file']['name'].'">file/'.$_FILES['file']['name'].'</a>';//顯示檔案路徑



$itemname = $_POST["itemname"];

$describe =	$_POST["describe"];
$image="http://140.127.218.250:49002/file/".$_FILES['file']['name'];
$date =	$_POST["date"];
$iftaken =	$_POST["iftaken"];

$sql = "insert into itemlog(itemname,describe1,image,date,iftaken) values('$itemname','$describe','$image','$date','$iftaken')";

mysqli_query($conn,$sql);


}

#$sql = "insert into itemlog(itemname,describe1,image,iftaken) values('aa','bb','cc','0')";

#mysqli_query($conn,$sql);

 ?>