<?php 
include_once("config.php");
include_once("back.php");
$result =showcategories($conn);
$result2=showcategories($conn);
$findc= findc($conn,$_GET['id']);
$findl= findl($conn,$_GET['id']);
$cat =showcategories($conn);
$list=showlist($conn);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	if (!empty($_SESSION['message'])) {
    echo '<p class="message"> '.$_SESSION['message'].'</p><br>';
    unset($_SESSION['message']);
	}
	?>
<hr>
<!-- -------------------------------------------------------------------------------------- -->
<div>add catagory</div>	
<form method="POST" action="back.php">
	<input type="hidden" name="addc">
	<input type="text" name="name">
	<input type="submit">
</form>
<br> 
<hr>
<!-- -------------------------------------------------------------------------------------- -->
<div>add list</div>
<form method="POST" action="back.php" >
<input type="hidden" name="addl">
<br> 
<input type="text" name="name">
<br> 
<select name="catagory_id" >
<?php foreach($result as $row): ?> 
<option value="<?php echo $row["id"]; ?>">
<?php echo $row["name"]; ?>
</option>
<?php endforeach ?> 
</select>
<br> 
<textarea name="text" ></textarea>
<br> 
<input type="submit">
</form>
<hr>
<!-- -------------------------------------------------------------------------------------- -->
<div>edit,delete catagory</div>
<form method="POST" action="back.php">
	<input type="hidden" name="editc">
	<input type="hidden" name="id" value="<?php echo $findc["id"]; ?>">
	<input type="text" name="name" value="<?php echo $findc["name"]; ?>">
	<input type="submit">
</form>
<form method="POST" action="back.php">
	<input type="hidden" name="deletec">
	<input type="hidden" name="id" value="<?php echo $findc["id"]; ?>">
	<input type="submit" value="delete">
</form>
<br> 
<hr>
<!-- -------------------------------------------------------------------------------------- --> 
<div>edit list</div>
<form method="POST" action="back.php" >
<input type="hidden" name="editl">
<input type="hidden" name="id" value="<?php echo $findl["id"]; ?>">
<br> 
<input type="text" name="name" value="<?php echo $findl["name"]; ?>">
<br> 
<select name="catagory_id" value="<?php echo $findl["catagory_id"]; ?>">
<?php foreach($result2 as $row): ?> 
<option value="<?php echo $row["id"]; ?>">
<?php echo $row["name"]; ?>
</option>
<?php endforeach ?> 
</select>
<br> 
<textarea name="text" ><?php echo $findl["text"]; ?></textarea>
<br> 
<input type="submit">
</form>
<form method="POST" action="back.php">
	<input type="hidden" name="deletel">
	<input type="hidden" name="id" value="<?php echo $findl["id"]; ?>">
	<input type="submit" value="delete">
</form>
<hr>
<!-- -------------------------------------------------------------------------------------- -->
<div>show catagory</div><br>
<?php foreach($cat as $row): ?> 
<div><?php echo $row["id"]; ?> <?php echo $row["name"]; ?></div>
<?php endforeach ?> 
<!-- -------------------------------------------------------------------------------------- -->
<hr>
<div>show list</div><br>
<?php foreach($list as $row): ?> 
<div><?php echo $row["id"];?> <?php echo $row["name"];?> <?php echo $row["catagory_id"];?> <?php echo $row["text"];?> <?php $x=$row["text"]; echo substr($x, 0, 10);?></div>
<?php endforeach ?>


<br><br><br><br>
<a href="edit.php?id=<?php echo $row["id"];?>">aaa</a>
<br><br><br><br>
<!-- -------------------------------------------------------------------------------------- -->
<hr>
<div>search catagory</div><br>
<form method="POST" action="back.php">
	<input type="hidden" name="searchc">
	<input type="text" name="name">
	<input type="submit">
</form>
<?php 
	if (!empty($_SESSION['searchc'])) {
		foreach ($_SESSION['searchc'] as $row) {
			echo $row[0]." ".$row[1].'<br>';
		}
    unset($_SESSION['searchc']);
	}
	?>
<!-- -------------------------------------------------------------------------------------- -->
<hr>
<div>search list</div><br>
<form method="POST" action="back.php">
	<input type="hidden" name="searchl">
	<input type="text" name="name">
	<input type="submit">
</form>
<?php 
	if (!empty($_SESSION['searchl'])) {
		foreach ($_SESSION['searchl'] as $row) {
			echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3].'<br>';
		}
    unset($_SESSION['searchl']);
	}
	?>











</body>
</html>