<html>
<head>
<title>
My first Laravel Page
</title>
</head>

<body>
<h1>Hello World</h1>
<a href='report.html'>report</a>
<a href='auth/login'>login</a>
<a href='auth/register'>register</a>
<form action="/" method="post">
name<input type="text" name="name" value=""/>
age<input type="number" name="age" value=""/>
<input type="hidden" name="_token" value="{{ csrf_token()}}">
<input type="submit" name="submit"/>

</form>
<?php	foreach($images as $img){
		echo '<img src="', $img->avatar->url('medium'), '">';
        }
?>
</body>

</html>

