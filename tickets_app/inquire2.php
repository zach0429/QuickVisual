﻿<?php require_once('Connections/connSQL.php'); ?>
<?php
$colname_rs = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rs = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysqli_select_db($connSQL, $database_connSQL);
$query_rs = sprintf("SELECT * FROM a_account WHERE a_account = '%s'", $colname_rs);
$rs = mysqli_query($connSQL,$query_rs) or die(mysql_error());
$row_rs = mysqli_fetch_assoc($rs);
$totalRows_rs = mysqli_num_rows($rs);
?><!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>app</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="最新好看的電影都在這裡喔" />
		<meta name="keywords" content="最新 上映" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<style type="text/css">
<!--
.style1 {color: #333333}
.style4 {font-size: large}
-->
        </style>

	</head>
	<body id="top">

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="#">Ion</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php" >回首頁</a></li>
						<li><a href="account.php" class="button special">會員專區</a></li>
						<li><a href="tickets.php">線上訂票</a></li>
						<li><a href="information.php">電影資訊</a></li>
						<li><a href="sys.php" >店家中心</a></li>
						<li><a href="about.php">關於我們</a></li>
						<li><a href="message.php" >意見回饋</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
	<section id="main" class="wrapper style1">
	  <header class="major">
					<h2>Quick-Visual</h2>
		  <p>&nbsp;</p>
	  </header>
				<div class="container">
				  <section>
						<h2 align="center">Movie Ticket APP</h2>
					    <div align="center"><a href="#" class="image fit"><img src="jpg/8.jpg" width="100%" height="278"></a></div>
				  </section>
				  <div align="center">	  <span class="style4">您的點數:<?php echo $row_rs['atm']; ?>點<br>
			        <br>
		           &lt;&lt;如何加值&gt;&gt;</span>
				    <table width="80%" border="1">
                      <tr>
                        <td>Quicl-Visual為了更方便您的付款速度，提供了加值功能。使用者們可於銀行、郵局、或ATM等金融機構進行匯款，請將金額匯至[0000000]這個帳戶，匯款完成後請在&quot;意見回饋&quot;這裡的意見欄位，寫下&quot;姓名-銀行或郵局帳號-金額-日期&quot;即可。店家端每半個小時會進行查收，確認無誤後會將點數轉至您的帳戶，屆時在麻煩您注意。每日查收時間為早上8:00至晚上12:00，超過時間恕不查收請使用者見諒。Quick-Visual感謝您。</td>
                      </tr>
                    </table>
				    <br>
				  </div>
		</div>
	</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
				  <ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
				  </ul>
				</div>
			</footer>

	</body>
</html>
<?php
mysql_free_result($rs);
?>