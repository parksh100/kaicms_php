<?php
    $ctype = $_POST['ctype'];
    $name_ko= $_POST['name_ko'];
    $name_en= $_POST['name_en'];
    $biz_no= $_POST['biz_no'];
    $ceo= $_POST['ceo'];
    $ceo_mobile = $_POST['ceo_mobile'];
    $ceo_email = $_POST['ceo_email'];
    $phone = $_POST['phone'];
    $fax = $_POST['fax'];
    $zipcode = $_POST['zip_code'];
    $addr_ko = $_POST['addr_ko'];
    $addr_ko_detail = $_POST['addr_ko_detail'];
    $addr_en = $_POST['addr_en'];
    $addr_en_detail = $_POST['addr_en_detail'];
    $charged_person= $_POST['charged_person'];
    $charged_person_mobile = $_POST['charged_person_mobile'];
    $charged_person_email = $_POST['charged_person_email'];
    $homepage = $_POST['homepage'];
    $organize_scope = $_POST['organize_scope'];
    $employee_count = $_POST['employee_count'];
    $dev = $_POST['dev'];
    $dev_employee_count = $_POST['dev_employee_count'];
    $scope_ko = $_POST['scope_ko'];
    $scope_en = $_POST['scope_en'];
    $certification_activity = $_POST['certification_activity'];
    $certification_activity_string = implode(',', $certification_activity);
    $iaf_code = $_POST['iaf_code'];
    $iaf_code_string = implode(',', $iaf_code);
    $process = $_POST['process'];
    $exclusion = $_POST['exclusion'];
    $exclusion_reason = $_POST['exclusion_reason'];
    $outsourcing = $_POST['outsourcing'];
    $outsourcing_process = $_POST['outsourcing_process'];
    $construction_license = $_POST['construction_license'];
    $construction_content = $_POST['construction_content'];

    // $biz_letter_file = print_r($_FILES);
    $biz_letter_file = $_POST['biz_letter_file'];
    $biz_letter_file_original_name = $_POST['biz_letter_file_original_name'];
    $biz_letter_file_size = $_POST['biz_letter_file_size'];
    $biz_letter_file_type = $_POST['biz_letter_file_type'];

    $before_cert_file = $_POST['before_cert_file'];
    $before_cert_file_original_name = $_POST['before_cert_file_original_name'];
    $before_cert_file_size = $_POST['before_cert_file_size'];
    $before_cert_file_type = $_POST['before_cert_file_type'];
    
    // 출력해보기
    echo $ctype . "<br>";
    echo $name_ko . "<br>";
    echo $name_en . "<br>";
    echo $biz_no . "<br>";
    echo $ceo . "<br>";
    echo $ceo_mobile . "<br>";
    echo $ceo_email . "<br>";
    echo $phone . "<br>";
    echo $fax . "<br>";
    echo $zipcode . "<br>";
    echo $addr_ko . "<br>";
    echo $addr_ko_detail . "<br>";
    echo $extraAddress . "<br>";
    echo $addr_en . "<br>";
    echo $addr_en_detail . "<br>";
    echo $charged_person . "<br>";
    echo $charged_person_mobile . "<br>";
    echo $charged_person_email . "<br>";
    echo $homepage . "<br>";
    echo $organize_scope . "<br>";
    echo $employee_count . "<br>";
    echo $dev . "<br>";
    echo $dev_count . "<br>";
    echo $scope_ko . "<br>";
    echo $scope_en . "<br>";
    print_r($certification_activity) ;
    echo "<br>";
    echo $certification_activity_string . "<br>";
    print_r($iaf_code);
    echo "<br>";
    echo $iaf_code_string . "<br>";
    echo $process . "<br>";
    echo $exclusion . "<br>";
    echo $exclusion_reason . "<br>";
    echo $outsourcing . "<br>";
    echo $outsourcing_process . "<br>";
    echo $construction_license . "<br>";
    echo $construction_content . "<br>";
   
    echo $biz_letter_file_size . "<br>";
    echo $biz_letter_file_type . "<br>";
    echo $biz_letter_file . "<br>";
    echo $biz_letter_file_original_name . "<br>";
   
    echo $before_cert_file . "<br>";
    echo $before_cert_file_original_name . "<br>";
    echo $before_cert_file_size . "<br>";
    echo $before_cert_file_type . "<br>";
   

if($_FILES['biz_letter_file']['error'] >0){
    echo "Error: " . $_FILES['biz_letter_file']['error'] . "<br>";
} else {
    echo "Upload: " . $_FILES['biz_letter_file']['name'] . "<br>";
    echo "Type: " . $_FILES['biz_letter_file']['type'] . "<br>";
    echo "Size: " . ($_FILES['biz_letter_file']['size'] / 1024) . " Kb<br>";
    echo "Stored in: " . $_FILES['biz_letter_file']['tmp_name'];

    
}

    // 변수 할당
    $biz_letter_file = $_FILES['biz_letter_file']['name'];
    $biz_letter_file_original_name = $_FILES['biz_letter_file']['name'];
    $biz_letter_file_size = $_FILES['biz_letter_file']['size'];
    $biz_letter_file_type = $_FILES['biz_letter_file']['type'];
    $biz_letter_file_tmp_name = $_FILES['biz_letter_file']['tmp_name'];
    $biz_letter_file_error = $_FILES['biz_letter_file']['error'];

    // echo "파일명:".$biz_letter_file . "<br>";
    echo "사업자파일오리지널명:".$biz_letter_file_original_name . "<br>";
    echo "사업자파일사이즈:".$biz_letter_file_size . "<br>";
    echo "사업자파일형식:".$biz_letter_file_type . "<br>";
    echo "사업자파일위치:".$biz_letter_file_tmp_name . "<br>";
    echo "사업자파일에러메세지".$biz_letter_file_error . "<br>";


        // 이전인증서 변수 할당
        $before_cert_file = $_FILES['before_cert_file']['name'];
        $before_cert_file_original_name = $_FILES['before_cert_file']['name'];
        $before_cert_file_size = $_FILES['before_cert_file']['size'];
        $before_cert_file_type = $_FILES['before_cert_file']['type'];
        $before_cert_file_tmp_name = $_FILES['before_cert_file']['tmp_name'];
        $before_cert_file_error = $_FILES['before_cert_file']['error'];
    
        // echo "파일명:".$biz_letter_file . "<br>";
        echo "사업자파일오리지널명:".$before_cert_file_original_name . "<br>";
        echo "사업자파일사이즈:".$before_cert_file_size . "<br>";
        echo "사업자파일형식:".$before_cert_file_type . "<br>";
        echo "사업자파일위치:".$before_cert_file_tmp_name . "<br>";
        echo "사업자파일에러메세지".$before_cert_file_error . "<br>";

    // 파일 업로드
    // if(isset($_FILES['biz_letter_file'])){
    //     echo $biz_letter_file . "<br>";
    //     echo $biz_letter_file_original_name . "<br>";
    //     echo $_FILES['biz_letter_file']['name'] . "<br>";
    //     echo $_FILES['biz_letter_file']['size'] . "<br>";
    //     $target_dir = "uploads/";
    //     $target_file = $target_dir . basename($_FILES["biz_letter_file"]["name"]);
        
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         if (move_uploaded_file($_FILES["biz_letter_file"]["tmp_name"], $target_file)) {
    //             // echo "The file ". htmlspecialchars( basename( $_FILES["biz_letter_file"]["name"])). " has been uploaded.";
    //             echo "<script>alert('The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.');</script>";
    //         } else {
    //             echo "업로드에 실패했습니다.";
    //         }
    //     }
    // }else{
    //     echo "파일이 없습니다.";
    // }

// 사업자등록증 업로드
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["biz_letter_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["biz_letter_file"]["tmp_name"]);
        if($check !== false) {
            echo "파일은 이미지입니다. - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "파일은 이미지가 아닙니다.";
            $uploadOk = 0;
        }
    }

   // $uploadOk =0 이면 파일 업로드 실패
    if ($uploadOk == 0) {
        echo "사업자등록증 파일 업로드 실패";
         // $uploadOk = 1 이면 파일 업로드 성공
    } else {
        if (move_uploaded_file($_FILES["biz_letter_file"]["tmp_name"], $target_file)) {
            echo "파일 ". htmlspecialchars( basename( $_FILES["biz_letter_file"]["name"])). " 사업자등록증 업로드 성공.";
        } else {
            echo "사업자등록증 파일 업로드 실패";
        }
    }
 // ===================================================
    // 이전인증서 업로드
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["before_cert_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["before_cert_file"]["tmp_name"]);
        if($check !== false) {
            echo "파일은 이미지입니다. - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "파일은 이미지가 아닙니다.";
            $uploadOk = 0;
        }
    }

     // $uploadOk =0 이면 파일 업로드 실패
     if ($uploadOk == 0) {
        echo "이전 인증서 파일 업로드 실패";
         // $uploadOk = 1 이면 파일 업로드 성공
    } else {
        if (move_uploaded_file($_FILES["before_cert_file"]["tmp_name"], $target_file)) {
            echo "파일 ". htmlspecialchars( basename( $_FILES["before_cert_file"]["name"])). " 이전 인증서 업로드 성공.";
        } else {
            echo "이전 인증서 파일 업로드 실패";
        }
    }

   


    // db connection
    $servername = "localhost";
    $username = "root";
    $password ="root";
    $dbname = "kaicms";

 $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    // 변수 할당
    $biz_letter_file_original_name = $_FILES['biz_letter_file']['name'];
    $biz_letter_file_size = $_FILES['biz_letter_file']['size'];
    $biz_letter_file_type = $_FILES['biz_letter_file']['type'];
    $biz_letter_file_tmp_name = $_FILES['biz_letter_file']['tmp_name'];
    
    // $before_cert_file_original_name = $_FILES['before_cert_file']['name'];
    // $before_cert_file_size = $_FILES['before_cert_file']['size'];
    // $before_cert_file_type = $_FILES['before_cert_file']['type'];   
    // $before_cert_file_tmp_name = $_FILES['before_cert_file']['tmp_name'];

    
    $sql = "INSERT INTO customer (ctype, name_ko, name_en, biz_no, ceo, ceo_mobile, ceo_email, phone, fax, zipcode, addr_ko, addr_ko_detail, addr_en, addr_en_detail, charged_person, charged_person_mobile, charged_person_email, homepage, organize_scope, employee_count, dev, dev_employee_count, scope_ko, scope_en, certification_activity, iaf_code, process, exclusion, exclusion_reason, outsourcing, outsourcing_process, construction_license, construction_content, biz_letter_file_tmp_name, biz_letter_file_original_name, biz_letter_file_size, biz_letter_file_type,before_cert_file_tmp_name, before_cert_file_original_name, before_cert_file_size, before_cert_file_type)
     
             values ('$ctype', '$name_ko', '$name_en', '$biz_no', '$ceo', '$ceo_mobile', '$ceo_email', '$phone','$fax','$zipcode','$addr_ko','$addr_ko_detail','$addr_en','$addr_en_detail','$charged_person', '$charged_person_mobile', '$charged_person_email', '$homepage', '$organize_scope', '$employee_count', '$dev', '$dev_employee_count', '$scope_ko', '$scope_en', '$certification_activity_string', '$iaf_code_string', '$process', '$exclusion', '$exclusion_reason', '$outsourcing', '$outsourcing_process', '$construction_license', '$construction_content', '$biz_letter_file_tmp_name', '$biz_letter_file_original_name', '$biz_letter_file_size', '$biz_letter_file_type', '$before_cert_file_tmp_name', '$before_cert_file_original_name', '$before_cert_file_size', '$before_cert_file_type')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "New record created successfully";
        
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);



 ?>