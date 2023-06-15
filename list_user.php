<?php
 include "header.php";

?>



</head>

<body>
    <div class="container">
        <!-- 조회조건 -->
        <div class="row row-cols-lg-auto g-3 align-items-center mb-1">
            <div class="col-12">
                <input type="search" class="form-control" v-model.trim="searchName" @keyup.enter="getList"
                    placeholder="Name" />
            </div>
            <div class="col-12">
                <button class="btn btn-primary me-1" @click="getList">조회</button>
                <button class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#auditorModal"
                    @click="goToUserCreate">
                    생성
                </button>
                <button class="btn btn-info me-1" @click="doExcel">엑셀다운로드</button>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-light">
                    <th style="width: 5%">ID</th>
                    <th style="width: 10%">성명</th>
                    <th style="width: 10%">이메일</th>
                    <th style="width: 7%">비밀번호</th>
                    <th style="width: 7%">역할</th>
                    <th style="width: 17%">QMS가능코드</th>
                    <th style="width: 17%">EMS가능코드</th>
                    <th style="width: 17%">OHSMS가능코드</th>
                    <!-- <th>Status</th> -->
                    <th style="width: 15%">비고</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   // db connection
                    $servername = "localhost";
                    $username = "root";
                    $password ="";
                    $dbname = "kaicms";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT * FROM user";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                   
                    while($row = $result->fetch_assoc()) {
                        $user_id = htmlspecialchars($row['user_id']);
                        $user_name = htmlspecialchars($row['user_name']);
                        $user_email = htmlspecialchars($row['user_email']);
                        $user_pwd = htmlspecialchars($row['user_pwd']);
                        $user_role = htmlspecialchars($row ['user_role']);
                        $user_ohsms_iaf_code = htmlspecialchars($row['user_ohsms_iaf_code']);
                        $user_qms_iaf_code = htmlspecialchars($row['user_qms_iaf_code']);
                        $user_ems_iaf_code = htmlspecialchars($row['user_ems_iaf_code']);
                ?>
                <tr>
                    <td style="word-break: break-all"><?=$user_id?> </td>
                    <td style="word-break: break-all"><?=$user_name?></td>
                    <td style="word-break: break-all"><?=$user_email?></td>
                    <td style="word-break: break-all"><?=$user_pwd?></td>
                    <td style="word-break: break-all"><?=$user_role?></td>
                    <td style="word-break: break-all"><?=$user_ohsms_iaf_code?></td>
                    <td style="word-break: break-all"><?=$user_qms_iaf_code?></td>
                    <td style="word-break: break-all"><?=$user_ems_iaf_code?></td>
                    <!-- <td>{{ item.use_yn }}</td> -->
                    <td class='d-flex'>
                        <li type="button" class="btn btn-success btn-sm me-1" data-bs-toggle="modal"
                            data-bs-target="#auditorModal">
                            <a href="edit_user.php?user_id=<?=$user_id?>" class="btn btn-success btn-sm">수정</a>
                        </li>
                        <button class="btn btn-danger btn-sm me-1" @click="doDelete(item.user_id)">
                            삭제
                        </button>
                    </td>
                </tr>
                <?php
                    }   
                ?>









            </tbody>
        </table>
    </div>
</body>
<?php
include "footer.php";
?>