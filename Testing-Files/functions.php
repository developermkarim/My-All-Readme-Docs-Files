<?php
// anonymous function

$anonym = function($num1,$num2){
    return $num1 * $num2;
};
echo $anonym(12,54);echo "<br>";

// Recursive Functions

function recursive($arg)
{
    if($arg <= 1){
        return 1;
    };

    return $arg * recursive($arg - 1);
};

echo recursive(1);



// <!-- CallBack Functions -->

function operating($a,$b,$callback)
{
   return $callback($a, $b);
}echo "<br>";

$programm_func = operating(12,43,function($x,$y){
return $x - $y;
});

echo $programm_func; echo "<br>";

function calculate($num1,$num2,$callback)
{
    return $callback($num1,$num2);
};

function add($a,$b)
{
    return $a  + $b;
}
$result1 = calculate(8,6,'add');
echo $result1;echo "<br>";

// Database Functions

function connectToDatabase()
{
    $db = new PDO("mysql:host=localhost;mydb=dbname",'uername','password');
    return $db;
}

function table_query($userId)
{
   $db =  connectToDatabase();
    $stmt = $db->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    
}

// File Handling Functions


function myReadfile($myfile)
{
    if ($myfile !== false) {
        echo "File is open to read";
    }else{
        echo "file Not Open";
    }
};
$myfile  = file_get_contents('mkarim.doc');
myReadfile($myfile); echo "<br>";


function writeToFile($file,$data)
{
    if(file_put_contents($file,$data) !== false){
        echo "Data Writtten  to " . $file; 
    }else{
        echo "Data not writtten";
    }
};

 writeToFile('mkarim.doc',"New Data added"); echo "<br>";

function imgaeResize($image_source,$width,$height)
 {
    $myimage = imagecreatefromjpeg($image_source);
    $resized = imagescale($myimage,$width,$height);
    imagejpeg($resized,'myimage.png');
    imagedestroy($myimage);
 }


imgaeResize("show-product.jpeg",350,400);


function ProductImage($image_source,$width,$height)
{
    $myImageInfo = getimagesize($image_source);
    $image_mime = $myImageInfo['mime'];

    switch($image_mime){
        case 'image/jpeg':
            $myimage = imagecreatefromjpeg($image_source);
            break;
        case 'image/jpg':
            $myimage = imagecreatefrompng($image_source);
            break;
        case 'image/gif':
            $myimage = imagecreatefromgif($image_source);
            break;
        case "image/webp":
            break;
            $myimage = imagecreatefromwebp($image_source);
            default;
            return false;        
    }

    $resized  = imagescale($myimage,$width,$height);

    $image_ext = pathinfo($image_source,PATHINFO_EXTENSION);
    $prefix = 'product-';
    $unique_image = uniqid($prefix,true);
    $optimize_image = str_replace('.','',$unique_image);
    $main_image = substr($optimize_image,0,20); // (string $string, int $offset, int|null $length)
    switch($image_ext){
        case "jpeg":
            imagejpeg($resized, $main_image .'.'. $image_ext);
            break;
        case 'png':
            imagepng($resized,$main_image . '.' . $image_ext);
            break;
        case 'webp':
            imagewebp($resized,$main_image . '.' . $image_ext);
            break;
        case 'gif':
            imagegif($resized, $main_image . '.' . $image_ext);
            break;
            default;
            return false;
    }

    imagedestroy($resized);
    imagedestroy($myimage);
}

/* $isResizeImage = ProductImage('show-product.jpeg',400,450);
if ($isResizeImage == true) {
    echo 'Image processing and resizing successful.';
} else {
    echo 'Image processing and resizing failed.';
} */

echo "<br>";


function imageResize($image_source, $width, $height){
    $image_info = getimagesize($image_source);
    $mime_type = $image_info['mime'];

    switch ($mime_type) {
        case 'image/jpeg':
            $myimage = imagecreatefromjpeg($image_source);
            break;
        case 'image/png':
            $myimage = imagecreatefrompng($image_source);
            break;
        case 'image/webp':
            $myimage = imagecreatefromwebp($image_source);
            break;
        case 'image/gif':
            $myimage = imagecreatefromgif($image_source);
            break;
        default:
            // Unsupported image format
            return false;
    }

    $resized = imagescale($myimage, $width, $height);

    // Determine the output format based on the input format
    $output_extension = pathinfo($image_source, PATHINFO_EXTENSION);

    switch ($output_extension) {
        case 'jpeg':
            imagejpeg($resized, 'myimage.jpg');
            break;
        case 'png':
            imagepng($resized, 'myimage.png');
            break;
        case 'webp':
            imagewebp($resized, 'myimage.webp');
            break;
        case 'gif':
            imagegif($resized, 'myimage.gif');
            break;
        default:
            // Unsupported output format
            return false;
    }
    imagedestroy($myimage);
    imagedestroy($resized);
    
        }

    imageResize("show-product.jpeg", 350, 400);


    function hasspassword($password)
    {
      return   password_hash($password,PASSWORD_DEFAULT);
    };
       echo hasspassword('mkarim');echo "<br>";
    

    function varifypassword($password)
    {
         if(password_verify($password,'$2y$10$zIEhxbesFJjs7xX9OuPgjuHckqY8Weks3.4aroGtgNifWFqWigXsG')){
            return "password is ok";
         }else{
            return "password is not ok";
         }
    };

    echo varifypassword('mkarim'); echo "<br>";

    echo "php server : " . $_SERVER['PHP_SELF'];

    