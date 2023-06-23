<?php
    session_start();
    if(!isset($_SESSION['user_id'])) {
        header("Location: login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <title>고객사 리스트</title>

</head>

<body>
    <div class="container">
        <!-- 조회조건 -->
        <div class="row row-cols-lg-auto g-3 align-items-center mb-1">
            <div class="col-12">
                <input type="search" class="form-control" v-model.trim="searchName" @keyup.enter="getSearch"
                    placeholder="Name" />
            </div>
            <div class="col-12">
                <button class="btn btn-outline-primary me-1" @click="getSearch">
                    조회
                </button>
                <button class="btn btn-outline-success me-1" @click="goToList">
                    생성
                </button>
                <button class="btn btn-outline-dark me-1" @click="doExcel">
                    엑셀다운로드
                </button>
            </div>
        </div>
        <table class="table table-bordered" style="table-layout: fixed; font-size: 15px">
            <thead>
                <tr class="bg-light table-group-divider">
                    <!-- <th width="4%">ID</th> -->
                    <th style="width: 20%">회사명</th>
                    <!-- <th style="width: 7%">인증유형</th> -->
                    <th style="width: 7%">구분</th>
                    <th style="width: 7%">인원수</th>
                    <th style="width: 26%">인증범위</th>
                    <th style="width: 10%">심사원</th>
                    <th style="width: 5%">상태</th>
                    <th style="width: 10%">신청일</th>
                    <th style="width: 10%">바로가기</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                   // db connection
                    $servername = "localhost";
                    $username = "root";
                    $password ="root";
                    $dbname = "kaicms";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT customer.*, user.* FROM customer left JOIN user ON customer.user_id = user.user_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    print_r($result);
                   
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><a href='detail_customer.php?customer_id=".$row['customer_id']."'>".$row['name_ko']."</a></td>";
                        echo "<td>".$row['ctype']."</td>";
                        echo "<td>".$row['employee_count']."</td>";
                        echo "<td>".$row['scope_ko']."</td>";
                        echo "<td>".$row['auditor_name']."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "<td>".$row['customer_created']."</td>";
                        echo "<td><button class='btn btn-primary btn-sm me-1'>심사신청</button></td>";
                        echo "</tr>";
                    }
                    
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>