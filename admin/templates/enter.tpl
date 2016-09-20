<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>UPcms | Система управления сайтом</title>
	<meta name="description" content="UPcms - Система управления сайтом" />
	<meta name="keywords" content="UPcms, Система управления сайтом" />	
	<meta name="copyright" content="UP Studio" />
	<meta name="Author" content="UP Studio" />
	<link rel="icon" href="img/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/upcms.css"  />
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    {* jQuery UI *}
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css"  />
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
    {* Formly *}
    <link rel="stylesheet" type="text/css" href="css/formly.css"  />
	<script type="text/javascript" src="js/formly.js"></script>
</head>
<body>
<div id="admin_enter_form" class="lifted">
    <h1>Вход</h1>
    <div id="tape"></div>
    <div class="divider"></div>
    <form action="../admin/?page=enter" method="post" id="admin_enter">
        <input type="text" name="name" maxlength="40" placeholder="Логин" id="admin_enter_input_name" />
        <input type="password" name="password" maxlength="40" placeholder="Пароль" id="admin_enter_input_pass" />
        {if isset($error)}<div class="admin_enter_error">{$error}</div>{/if}
        <div id="admin_enter_button">Войти</div>
    </form>
    <div class="clear"></div>
</div>
<div id="upcms_logo"><img src="img/design/upcms_logo.png" alt="UPcms logo" /></div>
<div id="up_logo"><a href="http://up-studio.net" target="_blank"><img src="img/design/up_logo.png" alt="UP Studio logo" /></a></div>
</body>
</html>