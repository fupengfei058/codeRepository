<?php
//文件上传
function upload()
{
    if (!empty($_GET['submit'])) {
        $path="./upload/";
        if (!file_exists($path)) {
            mkdir("$path",0700);
        }
        $tp=array("image/gif","image/pjpeg","image/png","image/jpeg");
        if (!in_array($_FILES["filename"]["type"],$tp)) {
            echo "文件类型不正确";
            exit();
        }
        if ($_FILES["filename"]["size"]>(2048*1000)) {
            echo "文件大小不能超过2M";
            exit();
        }
        if ($_FILES["filename"]["name"]) {
            $file1=explode('.',$_FILES["filename"]["name"]);
            $kz=$file1[(count($file1)-1)];
            $time=time();
            $name=$time.".".$kz;
            $file2=$path.$name;
            $flag=1;
        }
        if ($flag) {
            $result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2);
        }
        if ($result) {
            echo "<script>alert('上传成功');</script>";
            echo "文件名：".$name;
            echo "路径：<br><img src='".$file2."'>";
        }
    }else {
        echo "<script>alert('上传失败');</script>";
    }
}