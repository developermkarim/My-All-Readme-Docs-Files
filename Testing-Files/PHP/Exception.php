<?php

class FileNotFountException extends Exception{};

function readFileContent($file_name)
{
    if (!file_exists($file_name)) {
        throw new FileNotFountException("File NOt FOund Here " . $file_name);
    }
    return file_get_contents($file_name);

}

try{
 echo readFileContent("mkarim.do");echo "<br>";
}catch(FileNotFountException $e){

    echo "Sorry, Something Went Wrong" . $e->getMessage();echo "<br>";
    echo "Catch Message Code " . $e->getCode();echo "<br>";
    echo "message LIne . " . $e->getLine(); echo "<br>";
    echo "Returns an array of the call stack -> ";print_r($e->getTrace());echo "<br>";
}finally{
    echo "Processing Complete";echo "<br>";
}

// another exception of custom

class CustomExcepetion extends Exception{

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message,$code,$previous);
    }

};

 function performAction($value)
{
    if ($value < 0) {
       throw new CustomExcepetion("Value Can not be Negative" . '<br/>');
    }

    return "PerForm action Successfully" . '<br/>';
}

try{
    $theValue = -5 ;
    $performValue = performAction($theValue);
    echo $performValue;
}catch(CustomExcepetion $error){
    echo "Custom Error Exception " . $error->getMessage();
}finally{
    Echo "Try Catch Processing is Completed";
}