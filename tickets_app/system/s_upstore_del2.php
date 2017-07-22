<?php require_once('../Connections/easyshop.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM s_product WHERE pro_id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysqli_select_db($easyshop, $database_easyshop);
  $Result1 = mysqli_query($easyshop,$deleteSQL) or die(mysql_error());

  $deleteGoTo = "s_upstore_del.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_RS = "1";
if (isset($_GET['id'])) {
  $colname_RS = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysqli_select_db($easyshop, $database_easyshop);
$query_RS = sprintf("SELECT * FROM s_product WHERE pro_id = %s", $colname_RS);
$RS = mysqli_query($easyshop,$query_RS) or die(mysql_error());
$row_RS = mysqli_fetch_assoc($RS);
$totalRows_RS = mysqli_num_rows($RS);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>商品管理</title>
</head>

<body>
<div align="center">商品管理 DEL
</div>
<?php require_once('system_top.php'); ?>
<form name="form1" method="post" action="">
  <div align="center">
    <input name="hiddenField" type="hidden" value="<?php echo $row_RS['pro_id']; ?>">
    <input type="submit" name="Submit" value="DEL">
  </div>
</form>
</body>
</html>
<?php
mysqli_free_result($RS);
?>
