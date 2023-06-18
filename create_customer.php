<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="./js/handler_create_customer.js"></script>


    <title>Document</title>

</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-4 fw-bold text-center">고객정보등록</h3>
        <hr />
        <!-- <form id="create_customer_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" -->
        <form id="create_customer_form" action="handler_create_customer.php" method="post"
            enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">고객구분</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ctype" id="new" value="신규" />
                        <label class="form-check-label" for="new">신규</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ctype" id="transfer" value="전환" />
                        <label class="form-check-label" for="transfer">전환</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">국문상호</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name_ko" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">영문상호</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" name="name_en"
                        placeholder="대소문자 구분, Co., Ltd. 또는 Inc.구분 정확하게 기재" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">사업자등록번호</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="biz_no" maxlength="12" placeholder="번호만 입력" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">대표자명</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ceo" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">대표자 휴대폰번호</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ceo_mobile" placeholder="번호만 입력" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">대표이메일</label>
                <div class="col-sm-9">
                    <input type="text" name="ceo_email" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">대표전화번호</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" placeholder="번호만 입력" maxlength="13" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">대표팩스번호</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="fax" placeholder="번호만 입력" maxlength="13" />
                </div>
            </div>




            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">우편번호</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="zip_code" id="postcode" readonly />
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-secondary" type="button" id="btn_search_addr">
                        주소검색
                    </button>

                </div>
                <!-- <button id="btn_search_addr">주소검색</button> -->
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">국문 주소</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="addr_ko" id="addr_ko" readonly />
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">상세주소</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="addr_ko_detail" id="addr_ko_detail" />
                </div>
            </div>
            <!-- <div class="row mb-3">
                <label class="col-sm-3 col-form-label">참고항목</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="extraAddress" id="addr_ko_extra" disabled />
                </div>
            </div> -->

            <!--end daum api  -->

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">영문 주소</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="addr_en" name="addr_en" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">영문 상세주소</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="addr_en_detail" name="addr_en_detail">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">담당자명/직위</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="charged_person" placeholder="홍길동/과장" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">담당자 휴대번호</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="charged_person_mobile" placeholder="번호만 입력"
                        maxlength="13" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">담당자 이메일</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="charged_person_email" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">홈페이지</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="homepage" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">조직의 범위</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="organize_scope" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">종업원 수</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="employee_count" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">설계/개발 유무</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dev" id="design_yes" value="yes" />
                        <label class="form-check-label" for="design_yes">있음</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dev" id="design_no" value="No" />
                        <label class="form-check-label" for="design_no">없음</label>
                    </div>
                </div>
            </div>
            <div id="employee-count-row">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">설계/개발 인원 수</label>
                    <div class="col-sm-9">
                        <div>
                            <input type="number" class="form-control" placeholder="설계/개발 인원 수"
                                name="dev_employee_count" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">국문 인증범위</label>
                <div class="col-sm-9">
                    <div>
                        <textarea class="form-control" name="scope_ko" id="scope_ko"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"><a href="https://translate.google.co.kr/?hl=ko" target="_blank">
                        영문 인증범위</a></label>

                <div class="col-sm-9">
                    <div>
                        <textarea class="form-control" id="scope_en" name="scope_en"></textarea>
                    </div>
                </div>
            </div>
            <!-- 활동 -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">인증범위 활동</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="certification_activity[]_1" value="설계개발"
                            name="certification_activity[]" />
                        <label class="form-check-label" for="certification_activity[]_1">설계/개발</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="certification_activity[]_2" value="제조생산"
                            name="certification_activity[]" />
                        <label class="form-check-label" for="certification_activity[]_2">제조/생산</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="certification_activity[]_3" value="설치시공"
                            name="certification_activity[]" />
                        <label class="form-check-label" for="certification_activity[]_3">설치/시공</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="certification_activity[]_4" value="판매"
                            name="certification_activity[]" />
                        <label class="form-check-label" for="certification_activity[]_4">판매</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="certification_activity[]_5" value="서비스"
                            name="certification_activity[]" />
                        <label class="form-check-label" for="certification_activity[]_5">서비스</label>
                    </div>
                </div>
            </div>
            <!-- 심사코드 -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">IAF 코드</label>
                <div class="col-sm-9">
                    <div>
                        <div class="bg-danger">
                            <label class="form-check-label text-white">심사원의 심사가능코드</label>
                            <p class="text-white" style="word-break: break-all">
                                QMS: {{ qms_auditable_code_list }}
                            </p>
                            <p class="text-white" style="word-break: break-all">
                                EMS: {{ ems_auditable_code_list }}
                            </p>
                            <p class="text-white" style="word-break: break-all">
                                OHSMS: {{ ohsms_auditable_code_list }}
                            </p>
                        </div>
                        <div>
                            {{ customer.iaf_code }}
                            <small class="text-primary">* 인증원의 계약검토를 통해 확정됩니다.</small>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_35" value="01" />
                            <label class="form-check-label" for="code_35">01-Q(농,수산업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_36" value="02" />
                            <label class="form-check-label" for="code_36">02-Q(광업 및 채석업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_1" value="03" />
                            <label class="form-check-label" for="code_1">03-QE(음식료 및 담배)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_2" value="04" />
                            <label class="form-check-label" for="code_2">04-Q(섬유 및 섬유제품)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_3" value="05" />
                            <label class="form-check-label" for="code_3">05Q(가죽 및 가죽제품)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_4" value="06" />
                            <label class="form-check-label" for="code_4">06-QE(목재 및 목재제품)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_5" value="07" />
                            <label class="form-check-label" for="code_5">07-Q(펄프, 종이, 종이제품)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_6" value="08"
                                disabled />
                            <label class="form-check-label" for="code_6">08(출판업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_7" value="09"
                                disabled />
                            <label class="form-check-label" for="code_7">09(인쇄업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_8" value="10" />
                            <label class="form-check-label" for="code_8">10-Q(코크스, 연탄 및 석유정제품 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_9" value="12" />
                            <label class="form-check-label" for="code_9">12-QE(화학물질, 화학제품 및 화학섬유 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_10" value="13"
                                disabled />
                            <label class="form-check-label" for="code_10">13(의료용 물질 및 의약품 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_11" value="14" />
                            <label class="form-check-label" for="code_11">14-QE(고무제품 및 플라스틱제품 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_12" value="15" />
                            <label class="form-check-label" for="code_12">15-QE(비금속 광물제품 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_13" value="16" />
                            <label class="form-check-label" for="code_13">16-QE(콘크리트, 시멘트, 석회 및 플라스터 등 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_14" value="17" />
                            <label class="form-check-label" for="code_14">17-QEO(1차 금속 및 금속가공제품 제조업 중 1차 금속 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="code_15" value="18" name="iaf_code[]" />
                            <label class="form-check-label" for="code_15">18-QEO(기계 및 장비 제조업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_16" value="19" />
                            <label class="form-check-label" for="code_16">19-QEO(전기기기 및 광학기기 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_17" value="20"
                                disabled />
                            <label class="form-check-label" for="code_17">20(조선업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_18" value="21"
                                disabled />
                            <label class="form-check-label" for="code_18">21(항공기 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_19" value="22" />
                            <label class="form-check-label" for="code_19">22-EO(기타 운송장비 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_20" value="23" />
                            <label class="form-check-label" for="code_20">23-QE(기타 제조업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_40" value="24"
                                disabled />
                            <label class="form-check-label" for="code_40">24(재생업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_21" value="25"
                                disabled />
                            <label class="form-check-label" for="code_21">25(전기공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_22" value="26"
                                disabled />
                            <label class="form-check-label" for="code_22">26(연료용 가스 공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_23" value="27"
                                disabled />
                            <label class="form-check-label" for="code_23">27(수도 및 증기 공급업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_24" value="28" />
                            <label class="form-check-label" for="code_24">28-QEO(건설업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_25" value="29" />
                            <label class="form-check-label" for="code_25">29-QEO(도소매업, 자동차 및 모터사이클 수리업, 개인 및 가정용품
                                수리업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_26" value="30" />
                            <label class="form-check-label" for="code_26">30-QE(숙박업, 음식점업 및 주점업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_27" value="31" />
                            <label class="form-check-label" for="code_27">31-QE(운송업, 창고업 및 통신업)</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_28" value="32" />
                            <label class="form-check-label" for="code_28">32-QEO(금융업, 보험업, 부동산업 및 임대업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_29" value="33" />
                            <label class="form-check-label" for="code_29">33-QEO(정보기술업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_41" value="34" />
                            <label class="form-check-label" for="code_41">34-QEO(전문, 과학 및 기술서비스업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_30" value="35" />
                            <label class="form-check-label" for="code_30">35-QEO(기타 서비스업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_31" value="36" />
                            <label class="form-check-label" for="code_31">36-QEO(공공 행정)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_32" value="37" />
                            <label class="form-check-label" for="code_32">37-QEO(교육 서비스업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_33" value="38"
                                disabled />
                            <label class="form-check-label" for="code_33">38(보건업 및 사회복지 서비스업)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iaf_code[]" id="code_34" value="39" />
                            <label class="form-check-label" for="code_34">39-Q(기타 사회 서비스업)</label>
                        </div>
                    </div>
                </div>
            </div>


            <!-- 공정 -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">제품(서비스)명 및 공정</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="process" />
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">적용제외조항 유무</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exclusion" id="exclusion_yes" value="yes" />
                        <label class="form-check-label" for="exclusion_yes">있음</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exclusion" id="exclusion_no" value="No" />
                        <label class="form-check-label" for="exclusion_no">없음</label>
                    </div>
                </div>
            </div>
            <div id="exclusion_reason-row">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">적용제외 조항/근거</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="exclusion_reason" />
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">외주처리 유무</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="outsourcing" id="outsourcing_yes"
                            value="yes" />
                        <label class="form-check-label" for="outsourcing_yes">있음</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="outsourcing" id="outsourcing_no"
                            value="No" />
                        <label class="form-check-label" for="outsourcing_no">없음</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">외주처리 프로세스</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="outsourcing_process" placeholder="외주처리 프로세스" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">건설면허보유 여부</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="construction_license"
                            id="construction_license_yes" value="yes" />
                        <label class="form-check-label" for="construction_license_yes">있음</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="construction_license"
                            id="construction_license_no" value="No" />
                        <label class="form-check-label" for="construction_license_no">없음</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">건설면허 내용</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="construction_content" placeholder="건설면허 내용" />
                </div>
            </div>

            <hr />
            <!-- 사업자등록증 첨부 -->
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label">사업자등록증 첨부</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" accept="application/pdf, image/*" accept-charset="utf-8"
                        name="biz_letter_file" />
                    <input type="text" class="form-control mt-2" />
                </div>

            </div>

            <div class="alert alert-secondary mb-5" role="alert">
                <ul>
                    <li>최대 1개 가능</li>
                    <li>파일 확장자 : pdf, 이미지 파일만 가능</li>
                </ul>
            </div>
            <!-- 이전인증서 첨부 -->
            <div>
                <div class="row mb-2">
                    <label class="col-sm-3 col-form-label">이전인증서 첨부</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" accept="application/pdf, image/*" accept-charset="utf-8"
                            name="before_cert_file" />
                        <input type="text" class="form-control mt-2" />
                    </div>

                </div>

                <div class="alert alert-secondary mb-5" role="alert">
                    <ul>
                        <li>최대 1개 가능</li>
                        <li>파일 확장자 : pdf, 이미지 파일만 가능</li>
                    </ul>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-secondary me-1" id="btn_goto_list">목록</button>
                <button type="button" class="btn btn-primary" id="btn_save" onclick="submitCustomerForm()">저장</button>
            </div>
    </div>
    </form>

    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

</body>

</html>