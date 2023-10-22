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


echo "FILE NAME WITHOUT EXTENSION IS " . pathinfo("mkarim.jpg",PATHINFO_FILENAME) . PHP_EOL .', FILE EXTENSION IS ' . pathinfo('mkarim.jpg',PATHINFO_EXTENSION) . ', FILE PATH DIR '. pathinfo('images/mkarim.jpg',PATHINFO_DIRNAME); /* PATHINFO_FILENAME . PATHINFO_EXTENSION; */
echo "<br>";

printf(pathinfo('images/mkarim.jpg',PATHINFO_ALL));echo "<br>";

$setcookine = setcookie('user','Alice',time() + 3600,'/');
if($setcookine)
echo "cookie set";
else
echo "Sorry, cookie not set";


?>
</body>
</html>