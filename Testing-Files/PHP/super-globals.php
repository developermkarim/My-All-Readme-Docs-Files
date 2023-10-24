<?php


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
echo "php server : " . $_SERVER['PHP_SELF'];

/* Super Global 2 systems */

$super_var = "I am Super Global";

function testSuperGlobalVar()
{
    $GLOBALS['super_var'];
    // Or
    global $super_var;
    $local_var = "I am Local";
}
echo testSuperGlobalVar();