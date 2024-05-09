<!doctype html>
<html lang="en">	
<?php ob_start();
ini_set('display_errors', '0');
?>
<title>Mind Cool</title>
<link rel="icon" type="image/x-icon" href="<?=base_url()?>/media/images/logo.ico">
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<meta name="keywords" content="" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>media/font-awesome/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</script>
<style>
header, footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
}

body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    font-size:18px
}

    header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-left h1 {
    margin: 0;
}

.header-right ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.header-right li {
    margin-right: 20px;
}

.header-right a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}
a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
 }
</style>
</head>
<body>
<header>
    <div class="header-left">
        <h1><a href="<?=base_url()?>">
        <img src= "<?=base_url()?>/media/images/MindCoolLogo.png"alt="Mind Cool Logo" style="width: 130px; height: auto;"></a></h1>
    </div>
    <nav class="header-right">
        <ul>
            <li><a href="<?=base_url()?>">Home</a></li>
            <li><a href="<?=base_url()?>/common/about">About</a></li>
            <li><a href="<?=base_url()?>/login/user" target="_blank">My Account</a></li>
        </ul>
    </nav>
</header>