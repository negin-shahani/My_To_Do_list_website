<?php 
include_once("config.php");

if (isset($_POST['addc'])) {
  addc($conn);
}
if (isset($_POST['addl'])) {
  addl($conn);
}
if (isset($_POST['editc'])) {
  editc($conn);
}
if (isset($_POST['editl'])) {
  editl($conn);
}
if (isset($_POST['deletec'])) {
  deletec($conn);
}
if (isset($_POST['deletel'])) {
  deletel($conn);
}
if (isset($_POST['searchc'])) {
  searchc($conn);
}
if (isset($_POST['searchl'])) {
  searchl($conn);
}





function addc($conn) {
  try {
  	$x=$_POST['name'];
  	$sql = "INSERT INTO categories (name) VALUES ('$x')";
    $conn->exec($sql);
    $_SESSION['message'] = 'succes';
    header("Location:index.php");
  } catch (Exception $e) {
  	$_SESSION['message'] = 'failed';
  	header("Location:index.php");
  }
}
function addl($conn) {
  try {
  	$x=$_POST['name'];
  	$y=$_POST['catagory_id'];
  	$z=$_POST['text'];
  	$sql = "INSERT INTO list (name,catagory_id,text) VALUES ('$x','$y','$z')";
    $conn->exec($sql);
    $_SESSION['message'] = 'succes';
    header("Location:index.php");
  } catch (Exception $e) {
  	$_SESSION['message'] = 'failed';
  	header("Location:index.php");
  }
}
function showcategories($conn) {
  try {
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    return $result;
  } catch (Exception $e) {  
    return [];
  }
}
function showlist($conn) {
  try {
    $sql = "SELECT * FROM list";
    $result = $conn->query($sql);
    return $result;
  } catch (Exception $e) {  
    return [];
  }
}
function findc($conn,$id) {
  try {
    $sql = "SELECT * FROM categories WHERE id=$id";
    $result = $conn->query($sql);
    $res=[];
    foreach ($result as $r) {
      $res=$r;
      break;
    }
    return $res;
  } catch (Exception $e) {  
    return ['id'=>'','name'=>''];
  }
}
function findl($conn,$id) {
  try {
    $sql = "SELECT * FROM list WHERE id=$id";
    $result = $conn->query($sql);
    $res=[];
    foreach ($result as $r) {
      $res=$r;
      break;
    }
    return $res;
  } catch (Exception $e) {  
    return ['id'=>'','name'=>'','catagory_id'=>'','text'=>''];
  }
}
function editc($conn) {
  try {
    $id=$_POST['id'];
    $x=$_POST['name'];
    $sql = "UPDATE categories SET name='$x' WHERE id=$id";
    $conn->query($sql);
    $_SESSION['message'] = 'succes';
    header("Location:index.php?id=$id");
  } catch (Exception $e) {
    $_SESSION['message'] = 'failed';
    header("Location:index.php?id=$id");
  }
}
function editl($conn) {
  try {
    $id=$_POST['id'];
    $x=$_POST['name'];
    $y=$_POST['catagory_id'];
    $z=$_POST['text'];
    $sql = "UPDATE list SET name='$x',catagory_id='$y',text='$z' WHERE id=$id";
    $conn->query($sql);
    $_SESSION['message'] = 'succes';
    header("Location:index.php?id=$id");
  } catch (Exception $e) {
    $_SESSION['message'] = 'failed';
    header("Location:index.php?id=$id");
  }
}
function deletec($conn) {
  try {
    $id=$_POST['id'];
    if ($id !=1) {
      $sql = "DELETE FROM categories WHERE id=$id";
      $conn->query($sql);
      $_SESSION['message'] = 'succes';
    }
    header("Location:index.php");
  } catch (Exception $e) {
    $_SESSION['message'] = 'failed';
    header("Location:index.php");
  }
}
function deletel($conn) {
  try {
    $id=$_POST['id'];
    $sql = "DELETE FROM list WHERE id=$id";
    $conn->query($sql);
    $_SESSION['message'] = 'succes';
    header("Location:index.php");
  } catch (Exception $e) {
    $_SESSION['message'] = 'failed';
    header("Location:index.php");
  }
}
function searchc($conn) {
  try {
    $x=$_POST['name'];
    $sql = "SELECT * FROM categories WHERE name LIKE '%".$x."%' ";
    $result = $conn->query($sql);
    $res=[];
    foreach ($result as $r) {
     $res[]=$r;
    }
    $_SESSION['searchc']=$res;
    header("Location:index.php");
  } catch (Exception $e) {  
    header("Location:index.php");
  }
}
function searchl($conn) {
  try {
    $x=$_POST['name'];
    $sql = "SELECT * FROM list WHERE name LIKE '%".$x."%' ";
    $result = $conn->query($sql);
    $res=[];
    foreach ($result as $r) {
     $res[]=$r;
    }
    $_SESSION['searchl']=$res;
    header("Location:index.php");
  } catch (Exception $e) {  
    header("Location:index.php");
  }
}







 ?>