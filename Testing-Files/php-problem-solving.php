<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PROBLEM SOLVING</title>
</head>
<body>
    
    <?php
    error_reporting(E_PARSE);
    $str1 = "A Quick Brown Fox Over The lazy dogs" . PHP_EOL;

    $str2 = "Hello, PHP! PHP is great.";

    echo $str1;
    echo $str2;
    
    echo "<br>";
/*      error_reporting(E_WARNING);
echo $undefinedVariable;  */

$server_name = $_SERVER['PHP_SELF'];
echo "Server name: $server_name";echo "<br>";

echo 'server post : ' . $_SERVER['SERVER_PORT'];echo "<br>";
echo 'server https :' . $_SERVER['HTTPS'];echo "<br>";
echo 'server query URL : ' . $_SERVER['QUERY_URI'];echo "<br>";
echo 'server query string : ' . $_SERVER['QUERY_STRING'];echo "<br>";
echo 'server host : ' . $_SERVER['HTTP_HOST'];echo "<br>";
echo 'server Client IP Address : ' . $_SERVER['REMOTE_ADDR'];echo "<br>";
echo 'server HTTP REFERER : ' . $_SERVER['HTTP_REFERER'];echo "<br>";
echo 'server Request Method : ' . $_SERVER['REQUEST_METHOD'];echo "<br>";
echo 'server Name : ' . $_SERVER['SERVER_NAME'];echo "<br>";
echo 'User agent for browser address : ' . $_SERVER['HTTP_USER_AGENT'];echo "<br>";

echo "FILE NAME WITHOUT EXTENSION IS " . pathinfo("mkarim.jpg",PATHINFO_FILENAME) . PHP_EOL .', FILE EXTENSION IS ' . pathinfo('mkarim.jpg',PATHINFO_EXTENSION) . ', FILE PATH DIR '. pathinfo('images/mkarim.jpg',PATHINFO_DIRNAME); /* PATHINFO_FILENAME . PATHINFO_EXTENSION; */
echo "<br>";

printf(pathinfo('images/mkarim.jpg',PATHINFO_ALL));
    ?>

</body>
</html>