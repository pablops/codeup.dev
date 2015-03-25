<?php 


$items = array(
    array('link'=>'http://www.google.com', 'label'=>'Google'),
    array('link'=>'http://www.mcsweeneys.net', 'label'=>'McSweeney\'s'),
    array('link'=>'http://www.nytimes.com', 'label'=>'The New York Times'),
    array('link'=>'http://www.reddit.com/', 'label'=>'This Other Link'),
    array('link'=>'http://www.codeup.com', 'label'=>'Codeup')
);
$menu = '
    <ul>';
foreach ($items as $val) {
    $class = ($_SERVER['SCRIPT_NAME'] == $val['link']) ? ' class="current"' : '';
    $menu .= sprintf('<li><a href="%s">%s</a></li>', $val['link'], $val['label']);
}
$menu .= '
    </ul>';
echo $menu;

?>

<html>
<head>
	<title></title>
<style>
	body {
		background-color: green;
	}
	ul { list-style-type:none;padding:3px 0 20px 0;border-top:2px solid #E0E0E0;margin:10px 0; }
	ul li { float:left; margin:0 2px;width:auto; }
ul li a { display:block;padding:2px 10px;background-color:#E0E0E0;color:#2E3C1F;text-decoration:none; }
/* place the "current" pseudo class here */
ul li a.current { background-color:#40611F;color:#FFFFFF; }
ul li a:hover { background-color:#3C72B0; color:#FFFFFF; }

</style>
</head>
<body>

</body>
</html>