<?php

if($_GET){
    
    if(isset($_FILES['myfile'])){

        $file_name = $_FILES['myfile']['name'];
        $file_size = $_FILES['myfile']['size'];
        $file_tmp = $_FILES['myfile']['tmp_name'];
        $file_type = $_FILES['myfile']['type'];
        if(move_uploaded_file($file_tmp, "uploaded-images/". $file_name)){
            echo "file submitted";
        }
            

} else {
    echo " not submitted";
}

}
 
if(!empty($_GET['file']))
{
    $file_name = basename($_GET['myfile']);
    $filepath = 'destination/' . $file_name;
    if(!empty($file_name) && file_exists($filepath)){

//Define Headers
        header("Cache-Control: public");
        header("Content-Description: FIle Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");

        readfile($filepath);
        exit;

    }
    else{
        echo "This File Does not exist.";
    }
}


    ?>
    <a href="fileupload.php?file=2-1.jpg">click HERE</a>
   
<html>
<body>
    <form method="GET" enctype="multipart/form-data">

        <input type="file" name="myfile" /> <br>
        <input type="submit" name="submit"/>

    </form>

</body>
</html>