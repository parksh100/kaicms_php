<?php

// 보여줄 customer_id를 받아온다.
if(isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];
    echo '수정할 고객의 ID는 '.$customer_id.'입니다.';
} else {
    echo "customer_id를 입력해주세요.";
    exit;
}

 // db connection
 $servername = "localhost";
 $username = "root";
 $password ="root";
 $dbname = "kaicms";
 
 $conn = new mysqli($servername, $username, $password, $dbname);
 
 $sql = "SELECT customer.*, user.user_name, user.user_email FROM customer inner join user on customer.user_id=user.user_id WHERE customer_id = $customer_id";
 $result = mysqli_query($conn, $sql);
//  print_r($result);


$row = mysqli_fetch_array($result);
// var_dump($row);
//  echo "<br>";

if($row == null) {
    echo "해당 고객이 없습니다.";
    exit;
}

$customer_id = $row['customer_id'];
$customer_name_ko = $row['name_ko'];
$customer_name_en = $row['name_en'];
$customer_type = $row['ctype'];
$customer_biz_no = $row['biz_no'];
$customer_ceo = $row['ceo'];
$customer_ceo_mobile = $row['ceo_mobile'];
$customer_ceo_email = $row['ceo_email'];
$customer_phone = $row['phone'];
$customer_fax = $row['fax'];
$customer_zipcode = $row['zipcode'];
$customer_addr_ko = $row['addr_ko'];
$customer_addr_ko_detail = $row['addr_ko_detail'];
$customer_addr_en = $row['addr_en'];
$customer_addr_en_detail = $row['addr_en_detail'];
$customer_charged_person = $row['charged_person'];
$customer_charged_person_mobile = $row['charged_person_mobile'];
$customer_charged_person_email = $row['charged_person_email'];
$customer_homepage = $row['homepage'];
$customer_organize_scope = $row['organize_scope'];
$customer_employee_count = $row['employee_count'];
$customer_dev = $row['dev'];
$customer_dev_employee_count = $row['dev_employee_count'];
$customer_scope_ko = $row['scope_ko'];
$customer_scope_en = $row['scope_en'];
$customer_certification_activity = $row['certification_activity'];
$customer_iaf_code = $row['iaf_code'];
$customer_process = $row['process'];
$customer_exclusion = $row['exclusion'];
$customer_exclusion_reason = $row['exclusion_reason'];
$customer_outsourcing = $row['outsourcing'];
$customer_outsourcing_process = $row['outsourcing_process'];
$customer_construction_license = $row['construction_license'];
$customer_construction_content = $row['construction_content'];
$customer_biz_letter_file_tmp_name = $row['biz_letter_file_tmp_name'];
$customer_biz_letter_file_original_name = $row['biz_letter_file_original_name'];
$customer_biz_letter_file_type = $row['biz_letter_file_type'];
$customer_biz_letter_file_size = $row['biz_letter_file_size'];
$customer_before_cert_file_tmp_name = $row['before_cert_file_tmp_name'];
$customer_before_cert_file_original_name = $row['before_cert_file_original_name'];
$customer_before_cert_file_type = $row['before_cert_file_type'];
$customer_before_cert_file_size = $row['before_cert_file_size'];
$customer_status = $row['status'];
$user_email = $row['user_email'];
$user_name = $row['user_name'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">



    <title>고객정보 상세페이지</title>

</head>

<body>
    <div class="container">
        <h3 class="mb-5 fw-bold text-center">ISO인증 고객정보 상세페이지</h3>
        <hr />

        <h5 class="fw-bold">
            <i class="fa-solid fa-square-caret-right" style="color: blueviolet"></i>
            기본정보
        </h5>
        <table class="table table-bordered table-sm">
            <colgroup>
                <col style="width: 20%" />
                <col style="width: 30%" />
                <col style="width: 20%" />
                <col style="width: 30%" />
            </colgroup>
            <tbody class="text-center table-group-divider">
                <tr>
                    <th>고객유형</th>
                    <td>
                        <?= $customer_type ?>
                    </td>
                    <th>사업자등록번호</th>
                    <td><?= $customer_biz_no ?></td>
                </tr>
                <tr>
                    <th>회사명(국문)</th>
                    <td><?= $customer_name_ko ?></td>
                    <th>회사명(영문)</th>
                    <td><?= $customer_name_en ?></td>
                </tr>
                <tr>
                    <th>대표자명</th>
                    <td><?= $customer_ceo ?></td>
                    <th>대표자 휴대폰번호</th>
                    <td><?= $customer_ceo_mobile ?></td>
                </tr>
                <tr>
                    <th>대표이메일</th>
                    <td><?= $customer_ceo_email ?></td>
                    <th>대표팩스번호</th>
                    <td><?= $customer_fax ?></td>
                </tr>
                <tr>
                    <th>국문 주소</th>
                    <td colspan="3" class="text-center">
                        <?= $customer_addr_ko ." ". $customer_addr_ko_detail ?>
                    </td>

                </tr>
                <tr>
                    <th>영문 주소</th>
                    <td colspan="3">
                        <?= $customer_addr_en_detail.","," ".$customer_addr_en ?>
                    </td>

                </tr>
                <tr>
                    <th>담당자명/직위</th>
                    <td><?= $customer_charged_person ?></td>
                    <th>담당자 휴대폰번호</th>
                    <td><?= $customer_charged_person_mobile ?></td>
                </tr>

                <tr>
                    <th>담당자 이메일</th>
                    <td><?= $customer_charged_person_email ?></td>
                    <th>홈페이지</th>
                    <td><?= $customer_homepage ?></td>
                </tr>

                <tr>
                    <th>조직의 범위</th>
                    <td colspan="3">
                        <?= $customer_organize_scope ?>
                    </td>
                    <!-- <th>대표자 휴대폰번호</th>
          <td>{{ customer.email }}</td> -->
                </tr>
            </tbody>
        </table>

        <h5 class="fw-bold mt-5 mb-3">
            <i class="fa-solid fa-square-caret-right" style="color: blueviolet"></i>
            인증신청정보
        </h5>

        <table class="table table-bordered table-sm">
            <colgroup>
                <col style="width: 20%" />
                <col style="width: 30%" />
                <col style="width: 20%" />
                <col style="width: 30%" />
            </colgroup>
            <tbody class="text-center table-group-divider">
                <tr>
                    <th>심사코드</th>
                    <td>
                        <?= $customer_iaf_code ?>
                    </td>
                    <th>종업원 수</th>
                    <td><?= $customer_employee_count ?></td>
                </tr>
                <tr>
                    <th>설계/개발 유무</th>
                    <td><?= $customer_dev ?></td>
                    <th>설계/개발 인원 수</th>
                    <td><?= $customer_dev_employee_count ?></td>
                </tr>

                <tr>
                    <th>국문 인증범위</th>
                    <td colspan="3"><?= $customer_scope_ko ?></td>
                    <!-- <th >담당자 휴대폰번호</th>
          <td>{{ customer.contact_phone }}</td> -->
                </tr>

                <tr>
                    <th>영문 인증범위</th>
                    <td colspan="3"><?= $customer_scope_en ?></td>
                    <!-- <th >홈페이지</th>
          <td>{{ customer.homepage }}</td> -->
                </tr>

                <tr>
                    <th>인증범위 활동</th>
                    <td colspan="3"><?= $customer_certification_activity ?></td>
                    <!-- <th></th>
          <td></td> -->
                </tr>

                <tr>
                    <th>제품(서비스) 공정</th>
                    <td colspan="3"><?= $customer_process ?></td>
                    <!-- <th></th>
          <td></td> -->
                </tr>
                <tr>
                    <th>적용제외조항 유무</th>
                    <td><?= $customer_exclusion ?></td>
                    <th>조항/근거</th>
                    <td><?= $customer_exclusion_reason ?></td>
                </tr>

                <tr>
                    <th>외주처리 유무</th>
                    <td><?= $customer_outsourcing ?></td>
                    <th>외주처리 프로세스</th>
                    <td><?= $customer_outsourcing_process ?></td>
                </tr>

                <tr>
                    <th>건설면허보유 여부</th>
                    <td><?= $customer_construction_license ?></td>
                    <th>건설면허 내용</th>
                    <td><?= $customer_construction_license ?></td>
                </tr>
            </tbody>
        </table>



        <h5 class="fw-bold mt-5 mb-3">
            <i class="fa-solid fa-square-caret-right" style="color: blueviolet"></i>
            심사원정보
        </h5>

        <table class="table table-bordered table-sm">
            <colgroup>
                <col style="width: 20%" />
                <col style="width: 30%" />
                <col style="width: 20%" />
                <col style="width: 30%" />
            </colgroup>
            <tbody class="text-center table-group-divider">
                <tr>
                    <th>심사원명</th>
                    <td><?= "$user_name" ?></td>
                    <th>심사원 이메일</th>
                    <td><?= "$user_email" ?></td>
                </tr>
                <tr>
                    <th>첨부파일</th>
                    <td colspan="2">
                        <?= $customer_biz_letter_file_original_name ?>
                    </td>
                    <td>
                        <button class="btn btn-outline-secondary d-print-none">
                            다운로드
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <p>
                당사는 KAI의 인증시스템 심사절차에 따라 제반정보를 제공하고 상기와 같은
                인증신청항목에 대한 인증심사를 수검하고자 관련 서류를 함께
                제출합니다.<button class="btn btn-secondary ms-2 d-print-none" @click="printApplication">
                    인쇄하기
                </button>
            </p>
            <span></span>
        </div>
        <hr class="mt-5 mb-5" />
        <!-- 계약검토 -->
        <!-- <div class="mb-5">
      <h5 class="fw-bold">
        <i class="fa-solid fa-square-caret-right" style="color: blueviolet"></i>
        계약검토
      </h5>
      <table class="table table-bordered table-sm">
        <tbody class="text-center align-middle">
          <tr>
            <th style="width: 20%">심사번호</th>
            <td style="width: 30%">
              {{ cr.audit_no }}
            </td>
            <th style="width: 20%">조직규모</th>
            <td style="width: 30%">
              {{ cr.company_scale }}
            </td>
          </tr>
          <tr>
            <th>환경복잡성</th>
            <td colspan="3" class="text-start">
              {{ cr.env_complexity }}
            </td>
          </tr>
          <tr>
            <th>안전보건 위험성</th>
            <td colspan="3" class="text-start">
              {{ cr.sh_risk }}
            </td>
          </tr>
          <tr>
            <th>심사코드</th>
            <td colspan="3" class="text-start ps-5">
              {{ cr.iafcode }}
            </td>
          </tr>
          <tr>
            <th>심사구분</th>
            <td>
              {{ cr.class_audit }}
            </td>
            <th>심사가능여부</th>
            <td>
              {{ cr.possibility_audit }}
            </td>
          </tr>
          <tr>
            <th>사업장</th>
            <td colspan="3">
              {{ cr.type_workspace }}
            </td>
          </tr>

          <tr>
            <th>내부심사실시</th>
            <td>
              {{ cr.internal_audit }}
            </td>
            <th>경영검토 실시여부</th>
            <td>
              {{ cr.management_review }}
            </td>
          </tr>

          <tr>
            <th>심사팀장</th>
            <td>
              {{ customer.auditor_name }}
            </td>
            <th>심사원</th>
            <td>
              {{ customer.s2_team }}
            </td>
          </tr>

          <tr>
            <th>MD적합성</th>
            <td>
              {{ cr.md_conformity }}
            </td>
            <th>기술전문가</th>
            <td>
              {{ cr.need_tech_expert }}
            </td>
          </tr>

          <tr>
            <th>1단계 심사 MD</th>
            <td>{{ cr.s1_md }} M/D</td>
            <th>2단계 심사 MD</th>
            <td>{{ cr.s2_md }} M/D</td>
          </tr>

          <tr>
            <th>계약자 및 검토자 의견</th>
            <td colspan="3">
              {{ cr.opinion }}
            </td>
          </tr>
          <tr>
            <th>계약변경</th>
            <td colspan="3">
              {{ cr.change }}
            </td>
          </tr>
        </tbody>
      </table>
      <div>
        <p>작성자 :</p>
        <p>검토자 :</p>
        <p>승인자 :</p>
        <span></span>
      </div>
    </div> -->
        <div class="text-end">
            <button class="btn btn-secondary me-1 d-print-none" @click="goToList">
                목록
            </button>
            <button class="btn btn-primary me-1 d-print-none" @click="goToChange">
                수정
            </button>
            <!-- <button class="btn btn-warning me-1" @click="goToCR">계약검토</button> -->
            <button class="btn btn-success me-1 d-print-none" @click="goToApply">
                심사신청
            </button>
        </div>
    </div>

</body>

</html>