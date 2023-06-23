<?php
// 파일첨부

//파일이 첨부된 경우와 첨부되지 않은 경우 구분
if(isset($_FILES['files']) && $_FILES['attach']['name'] != ''){
    $tmparr = explode(".", $_FILES['attach']['name']);
    $ext = end($tmparr);
    // $ext = strtolower(end(explode(".", $_FILES['files']['name']))); //확장자를 소문자로 변경 
    $flag = rand(1000, 9999);
    $filename = 'a'.date('YmdHis').$flag.'.'.$ext;

    echo $filename;
    exit;
}

?>