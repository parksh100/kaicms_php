<?php
 include "header.php";

 // 수정할 회원의 정보를 가져온다.
 if(isset($_GET['user_id'])){
     $user_id = $_GET['user_id'];  
     echo "수정할 user_id: ". $user_id;
 }else{
     echo "수정할 user_id가 없습니다.";
 }

 // db connection
$servername = "localhost";
$username = "root";
$password ="root";
$dbname = "kaicms";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM user WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);



$row = mysqli_fetch_array($result);

$user_id = htmlspecialchars($row['user_id']);
$user_name = htmlspecialchars($row['user_name']);
$user_email = htmlspecialchars($row['user_email']);
$user_pwd = htmlspecialchars($row['user_pwd']);
$user_role = htmlspecialchars($row ['user_role']);
$user_ohsms_iaf_code = htmlspecialchars($row['user_ohsms_iaf_code']);
$user_qms_iaf_code = htmlspecialchars($row['user_qms_iaf_code']);
$user_ems_iaf_code = htmlspecialchars($row['user_ems_iaf_code']);
$user_ohsms_iaf_code_array = explode(",", $user_ohsms_iaf_code);
$user_qms_iaf_code_array = explode(",", $user_qms_iaf_code);
$user_ems_iaf_code_array = explode(",", $user_ems_iaf_code);

mysqli_close($conn);
 

?>
<script>
function submitForm() {
    document.getElementById('myForm').submit();
}
</script>
</head>

<body>
    <form id="myForm" action="edit_all.php?user_id=<?=$user_id?>" method="post">
        <div class="container mt-5">
            <h3 class="mb-4 fw-bold text-center">심사원정보수정</h3>
            <hr />
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">성명</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" value="<?= $row['user_name']?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" placeholder=""
                        value="<?= $row['user_email']?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">비밀번호</label>
                <div class="col-sm-9">
                    <input type="text" name="pwd" class="form-control" placeholder="비밀번호를 입력하세요"
                        value="<?= $row['user_pwd']?>" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="role_1" value="auditor"
                            <?= $row['user_role']=='auditor'? 'checked':''?> />
                        <label class="form-check-label" for="role_1">심사원</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="role_2" value="lead_auditor"
                            <?= $row['user_role']=='lead_auditor'? 'checked':''?> />
                        <label class="form-check-label" for="role_2">선임심사원</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="role_3" value="senior_auditor"
                            <?= $row['user_role']=='senior_auditor'? 'checked':''?> />
                        <label class="form-check-label" for="role_3">검증심사원</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="role_4" value="admin"
                            <?= $row['user_role']=='admin'? 'checked':''?> />
                        <label class="form-check-label" for="role_4">관리자</label>
                    </div>
                </div>
            </div>

            <!--start daum api  -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">우편번호</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="postcode" name="zip_code" />
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-secondary">
                        주소검색
                    </button>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">국문 주소</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="add_ko" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">상세주소</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="detailAddress" name="add_ko_detail" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">참고항목</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="extraAddress" name="add_refer" />
                </div>
            </div>

            <!--end daum api  -->

            <!-- qms심사가능코드 -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">QMS심사가능코드</label>
                <div class="col-sm-9">
                    <div>
                        <div>
                            {{ auditor.qms_iaf_code }}
                            <small class="text-primary">* 인증원의 계약검토를 통해 확정됩니다.</small>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_1" value="01"
                                name="qms_iaf_code[]" <?= in_array('01',$user_ems_iaf_code_array) ? 'checked':''?> />

                            <label class="form-check-label" for="qms_iaf_code_1">01(농,수산업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_2" value="02"
                                name="qms_iaf_code[]" <?= in_array('02',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_2">02(광업 및 채석업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_3" value="03"
                                name="qms_iaf_code[]" <?= in_array('03',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_3">03(음식료 및 담배)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_4" value="04"
                                name="qms_iaf_code[]" <?= in_array('04',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_4">04(섬유 및 섬유제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_5" value="05"
                                name="qms_iaf_code[]" <?= in_array('05',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_5">05(가죽 및 가죽제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_6" value="06"
                                name="qms_iaf_code[]" <?= in_array('06',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_6">06(목재 및 목재제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_7" value="07"
                                name="qms_iaf_code[]" <?= in_array('07',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_7">07(펄프, 종이, 종이제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_8" value="08"
                                name="qms_iaf_code[]" <?= in_array('08',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_8">08(출판업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_9" value="09"
                                name="qms_iaf_code[]" <?= in_array('09',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_9">09(인쇄업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_10" value="10"
                                name="qms_iaf_code[]" <?= in_array('10',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_10">10(코크스, 연탄 및 석유정제품 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_11" value="12"
                                name="qms_iaf_code[]" <?= in_array('12',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_11">12(화학물질, 화학제품 및 화학섬유 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_12" value="13"
                                name="qms_iaf_code[]" <?= in_array('13',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_12">13(의료용 물질 및 의약품 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_13" value="14"
                                name="qms_iaf_code[]" <?= in_array('14',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_13">14(고무제품 및 플라스틱제품 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_14" value="15"
                                name="qms_iaf_code[]" <?= in_array('15',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_14">15(비금속 광물제품 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_15" value="16"
                                name="qms_iaf_code[]" <?= in_array('16',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_15">16(콘크리트, 시멘트, 석회 및 플라스터 등 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_16" value="17"
                                name="qms_iaf_code[]" <?= in_array('17',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_16">17(1차 금속 및 금속가공제품 제조업 중 1차 금속
                                제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_17" value="18"
                                name="qms_iaf_code[]" <?= in_array('18',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_17">18(기계 및 장비 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_18" value="19"
                                name="qms_iaf_code[]" <?= in_array('19',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_18">19(전기기기 및 광학기기 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_19" value="20"
                                name="qms_iaf_code[]" <?= in_array('20',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_19">20(조선업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_20" value="21"
                                name="qms_iaf_code[]" <?= in_array('21',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_20">21(항공기 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_21" value="22"
                                name="qms_iaf_code[]" <?= in_array('22',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_21">22(기타 운송장비 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_22" value="23"
                                name="qms_iaf_code[]" <?= in_array('23',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_22">23(기타 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_23" value="24"
                                name="qms_iaf_code[]" <?= in_array('24',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_23">24(재생업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_24" value="25"
                                name="qms_iaf_code[]" <?= in_array('25',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_24">25(전기공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_25" value="26"
                                name="qms_iaf_code[]" <?= in_array('26',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_25">26(연료용 가스 공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_26" value="27"
                                name="qms_iaf_code[]" <?= in_array('27',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_26">27(수도 및 증기 공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_27" value="28"
                                name="qms_iaf_code[]" <?= in_array('28',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_27">28(건설업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_28" value="29"
                                name="qms_iaf_code[]" <?= in_array('29',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_28">29(도소매업, 자동차 및 모터사이클 수리업, 개인 및 가정용품
                                수리업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_29" value="30"
                                name="qms_iaf_code[]" <?= in_array('30',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_29">30(숙박업, 음식점업 및 주점업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_30" value="31"
                                name="qms_iaf_code[]" <?= in_array('31',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_30">31(운송업, 창고업 및 통신업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_31" value="32"
                                name="qms_iaf_code[]" <?= in_array('32',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_31">32(금융업, 보험업, 부동산업 및 임대업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_32" value="33"
                                name="qms_iaf_code[]" <?= in_array('33',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_32">33(정보기술업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_33" value="34"
                                name="qms_iaf_code[]" <?= in_array('34',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_33">34(전문, 과학 및 기술서비스업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_34" value="35"
                                name="qms_iaf_code[]" <?= in_array('35',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_34">35(기타 서비스업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_35" value="36"
                                name="qms_iaf_code[]" <?= in_array('36',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_35">36(공공 행정)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_36" value="37"
                                name="qms_iaf_code[]" <?= in_array('37',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_36">37(교육 서비스업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_37" value="38"
                                name="qms_iaf_code[]" <?= in_array('38',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_37">38(보건업 및 사회복지 서비스업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="qms_iaf_code_38" value="39"
                                name="qms_iaf_code[]" <?= in_array('39',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="qms_iaf_code_38">39(기타 사회 서비스업)</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ems심사가능코드 -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">EMS심사가능코드</label>
                <div class="col-sm-9">
                    <div>
                        <div>
                            {{ auditor.ems_iaf_code }}
                            <small class="text-primary">* 인증원의 계약검토를 통해 확정됩니다.</small>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_01" value="01"
                                name="ems_iaf_code[]" <?= in_array('01',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_01">01(농,수산업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_02" value="02"
                                name="ems_iaf_code[]" <?= in_array('02',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_02">02(광업 및 채석업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_03" value="03"
                                name="ems_iaf_code[]" <?= in_array('03',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_03">03(음식료 및 담배)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_04" value="04"
                                name="ems_iaf_code[]" <?= in_array('04',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_04">04(섬유 및 섬유제품)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_05" value="05"
                                name="ems_iaf_code[]" <?= in_array('05',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_05">05(가죽 및 가죽제품)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_06" value="06"
                                name="ems_iaf_code[]" <?= in_array('06',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_06">06(목재 및 목재제품)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_07" value="07"
                                name="ems_iaf_code[]" <?= in_array('07',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_07">07(펄프, 종이, 종이제품)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_08" value="08"
                                name="ems_iaf_code[]" <?= in_array('08',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_08">08(출판업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_09" value="09"
                                name="ems_iaf_code[]" <?= in_array('09',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_09">09(인쇄업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_10" value="10"
                                name="ems_iaf_code[]" <?= in_array('10',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_10">10(코크스, 연탄 및 석유정제품 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_11" value="12"
                                name="ems_iaf_code[]" <?= in_array('12',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_11">12(화학물질, 화학제품 및 화학섬유 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_13" value="13"
                                name="ems_iaf_code[]" <?= in_array('13',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_13">13(의료용 물질 및 의약품 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_14" value="14"
                                name="ems_iaf_code[]" <?= in_array('14',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_14">14(고무제품 및 플라스틱제품 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_15" value="15"
                                name="ems_iaf_code[]" <?= in_array('15',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_15">15(비금속 광물제품 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_16" value="16"
                                name="ems_iaf_code[]" <?= in_array('16',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_16">16(콘크리트, 시멘트, 석회 및 플라스터 등 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_17" value="17"
                                name="ems_iaf_code[]" <?= in_array('17',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_17">17(1차 금속 및 금속가공제품 제조업 중 1차 금속
                                제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_18" value="18"
                                name="ems_iaf_code[]" <?= in_array('18',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_18">18(기계 및 장비 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_19" value="19"
                                name="ems_iaf_code[]" <?= in_array('19',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_19">19(전기기기 및 광학기기 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_20" value="20"
                                name="ems_iaf_code[]" <?= in_array('20',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_20">20(조선업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_21" value="21"
                                name="ems_iaf_code[]" <?= in_array('21',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_21">21(항공기 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_22" value="22"
                                name="ems_iaf_code[]" <?= in_array('22',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_22">22(기타 운송장비 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_23" value="23"
                                name="ems_iaf_code[]" <?= in_array('23',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_23">23(기타 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_24" value="24"
                                name="ems_iaf_code[]" <?= in_array('24',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_24">24(재생업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_25" value="25"
                                name="ems_iaf_code[]" <?= in_array('25',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_25">25(전기공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_26" value="26"
                                name="ems_iaf_code[]" <?= in_array('26',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_26">26(연료용 가스 공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_27" value="27"
                                name="ems_iaf_code[]" <?= in_array('27',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_27">27(수도 및 증기 공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_28" value="28"
                                name="ems_iaf_code[]" <?= in_array('28',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_28">28(건설업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_29" value="29"
                                name="ems_iaf_code[]" <?= in_array('29',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_29">29(도소매업, 자동차 및 모터사이클 수리업, 개인 및 가정용품
                                수리업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_30" value="30"
                                name="ems_iaf_code[]" <?= in_array('30',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_30">30(숙박업, 음식점업 및 주점업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_31" value="31"
                                name="ems_iaf_code[]" <?= in_array('31',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_31">31(운송업, 창고업 및 통신업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_32" value="32"
                                name="ems_iaf_code[]" <?= in_array('32',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_32">32(금융업, 보험업, 부동산업 및 임대업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_33" value="33"
                                name="ems_iaf_code[]" <?= in_array('33',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_33">33(정보기술업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_34" value="34"
                                name="ems_iaf_code[]" <?= in_array('34',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_34">34(전문, 과학 및 기술서비스업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_35" value="35"
                                name="ems_iaf_code[]" <?= in_array('35',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_35">35(기타 서비스업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_36" value="36"
                                name="ems_iaf_code[]" <?= in_array('36',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_36">36(공공 행정)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_37" value="37"
                                name="ems_iaf_code[]" <?= in_array('37',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_37">37(교육 서비스업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_38" value="38"
                                name="ems_iaf_code[]" <?= in_array('38',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_38">38(보건업 및 사회복지 서비스업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ems_iaf_code_39" value="39"
                                name="ems_iaf_code[]" <?= in_array('39',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ems_iaf_code_39">39(기타 사회 서비스업)</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ohsms심사가능코드 -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">OHSMS심사가능코드</label>
                <div class="col-sm-9">
                    <div>
                        <div>
                            {{ auditor.ohsms_iaf_code }}
                            <small class="text-primary">* 인증원의 계약검토를 통해 확정됩니다.</small>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_01" value="01"
                                name="ohsms_iaf_code[]" <?= in_array('01',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_01">01(농,수산업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_02" value="02"
                                name="ohsms_iaf_code[]" <?= in_array('02',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_02">02(광업 및 채석업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_03" value="03"
                                name="ohsms_iaf_code[]" <?= in_array('03',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_03">03(음식료 및 담배)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_04" value="04"
                                name="ohsms_iaf_code[]" <?= in_array('04',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_04">04(섬유 및 섬유제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_05" value="05"
                                name="ohsms_iaf_code[]" <?= in_array('05',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_05">05(가죽 및 가죽제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_06" value="06"
                                name="ohsms_iaf_code[]" <?= in_array('06',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_06">06(목재 및 목재제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_07" value="07"
                                name="ohsms_iaf_code[]" <?= in_array('07',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_07">07(펄프, 종이, 종이제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_08" value="08"
                                name="ohsms_iaf_code[]" <?= in_array('08',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_08">08(출판업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_09" value="09"
                                name="ohsms_iaf_code[]" <?= in_array('09',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_09">09(인쇄업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_10" value="10"
                                name="ohsms_iaf_code[]" <?= in_array('10',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_10">10(코크스, 연탄 및 석유정제품 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_11" value="12"
                                name="ohsms_iaf_code[]" <?= in_array('12',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_11">12(화학물질, 화학제품 및 화학섬유 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_13" value="13"
                                name="ohsms_iaf_code[]" <?= in_array('13',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_13">13(의료용 물질 및 의약품 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_14" value="14"
                                name="ohsms_iaf_code[]" <?= in_array('14',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_14">14(고무제품 및 플라스틱제품 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_15" value="15"
                                name="ohsms_iaf_code[]" <?= in_array('15',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_15">15(비금속 광물제품 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_16" value="16"
                                name="ohsms_iaf_code[]" <?= in_array('16',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_16">16(콘크리트, 시멘트, 석회 및 플라스터 등
                                제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_17" value="17"
                                name="ohsms_iaf_code[]" <?= in_array('17',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_17">17(1차 금속 및 금속가공제품 제조업 중 1차 금속
                                제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_18" value="18"
                                name="ohsms_iaf_code[]" <?= in_array('18',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_18">18(기계 및 장비 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_19" value="19"
                                name="ohsms_iaf_code[]" <?= in_array('19',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_19">19(전기기기 및 광학기기 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_20" value="20"
                                name="ohsms_iaf_code[]" <?= in_array('20',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_20">20(조선업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_21" value="21"
                                name="ohsms_iaf_code[]" <?= in_array('21',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_21">21(항공기 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_22" value="22"
                                name="ohsms_iaf_code[]" <?= in_array('22',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_22">22(기타 운송장비 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_23" value="23"
                                name="ohsms_iaf_code[]" <?= in_array('23',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_23">23(기타 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_24" value="24"
                                name="ohsms_iaf_code[]" <?= in_array('24',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_24">24(재생업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_25" value="25"
                                name="ohsms_iaf_code[]" <?= in_array('25',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_25">25(전기공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_26" value="26"
                                name="ohsms_iaf_code[]" <?= in_array('26',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_26">26(연료용 가스 공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_27" value="27"
                                name="ohsms_iaf_code[]" <?= in_array('27',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_27">27(수도 및 증기 공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_28" value="28"
                                name="ohsms_iaf_code[]" <?= in_array('28',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_28">28(건설업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_29" value="29"
                                name="ohsms_iaf_code[]" <?= in_array('29',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_29">29(도소매업, 자동차 및 모터사이클 수리업, 개인 및 가정용품
                                수리업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_30" value="30"
                                name="ohsms_iaf_code[]" <?= in_array('30',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_30">30(숙박업, 음식점업 및 주점업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_31" value="31"
                                name="ohsms_iaf_code[]" <?= in_array('31',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_31">31(운송업, 창고업 및 통신업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_32" value="32"
                                name="ohsms_iaf_code[]" <?= in_array('32',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_32">32(금융업, 보험업, 부동산업 및 임대업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_33" value="33"
                                name="ohsms_iaf_code[]" <?= in_array('33',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_33">33(정보기술업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_34" value="34"
                                name="ohsms_iaf_code[]" <?= in_array('34',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_34">34(전문, 과학 및 기술서비스업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_35" value="35"
                                name="ohsms_iaf_code[]" <?= in_array('35',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_35">35(기타 서비스업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_36" value="36"
                                name="ohsms_iaf_code[]" <?= in_array('36',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_36">36(공공 행정)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_37" value="37"
                                name="ohsms_iaf_code[]" <?= in_array('37',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_37">37(교육 서비스업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_38" value="38"
                                name="ohsms_iaf_code[]" <?= in_array('38',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_38">38(보건업 및 사회복지 서비스업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ohsms_iaf_code_39" value="39"
                                name="ohsms_iaf_code[]" <?= in_array('39',$user_ems_iaf_code_array) ? 'checked':''?> />
                            <label class="form-check-label" for="ohsms_iaf_code_39">39(기타 사회 서비스업)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="button" class="btn btn-secondary me-1" ">목록</button>
                <button type=" button" class="btn btn-primary" onclick="submitForm()">저장</button>
            </div>
        </div>
    </form>

</body>



<?php
include "footer.php";
?>