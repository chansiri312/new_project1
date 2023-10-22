<?php
if($_POST){
    if(isset($_FILES['upload'])){
        $name_file =  $_FILES['upload']['name'];
        $tmp_name =  $_FILES['upload']['tmp_name'];
        $locate_img ="../register/images/";
        move_uploaded_file($tmp_name,$locate_img.$name_file);
    }
}
?>