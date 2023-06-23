<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark d-print-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">KAI CERTIFICATION</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a href="searchView.php" class="nav-link" aria-current="page">인증조회</a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboardView.php" class="nav-link">대시보드
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="customerCreateView.php" class="nav-link">고객사등록</a>
                    </li>
                    <li class="nav-item">
                        <a href="auditorListView.php" class="nav-link">심사원현황</a>
                    </li>

                    <li class="nav-item">
                        <a href="customerListView.php" class="nav-link">고객사현황</a>
                    </li>

                    <li class="nav-item">
                        <a href="auditListView.php" class="nav-link">인증심사현황</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">보고서작성현황</a>
                    </li>
                    <li class="nav-item">
                        <a href="auditRampView.php" class="nav-link">심사진행현황</a>
                    </li>

                </ul>

                <div class="d-flex">
                    <span v-if="userInfo.name" class="text-white pt-2 me-4">{{ userInfo.name }} 위원님</span>
                    <button class="btn btn-outline-success">
                        로그아웃
                    </button>
                    <button class="btn btn-outline-success">
                        로그인
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>