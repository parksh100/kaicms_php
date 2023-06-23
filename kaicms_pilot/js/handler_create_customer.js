function submitCustomerForm() {
  const form = document.getElementById("create_customer_form");
  if (form.ctype.value == "") {
    alert("고객구분을 선택해주세요.");
    return false;
  }

  document.getElementById("create_customer_form").submit();
}

// 우편번호 찾기
document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btn_search_addr").addEventListener("click", (e) => {
    e.preventDefault();
    new daum.Postcode({
      oncomplete: function (data) {
        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
        // 예제를 참고하여 다양한 활용법을 확인해 보세요.
        console.log(data);

        let addr = ""; // 주소 변수
        let extra_addr = ""; // 참고항목 변수

        if (data.userSelectedType == "R") {
          // 사용자가 도로명 주소를 선택했을 경우
          addr = data.roadAddress;
        } else if (data.userSelectedType == "J") {
          // 사용자가 지번 주소를 선택했을 경우(J)
          addr = data.jibunAddress;
        }

        if (data.bname != "") {
          extra_addr = data.bname;
        }

        if (data.buildingName != "") {
          extra_addr +=
            extra_addr !== "" ? ", " + data.buildingName : data.buildingName;
        }

        // 합치기
        if (extra_addr !== "") {
          extra_addr = " (" + extra_addr + ")";
        }

        const addr_ko = document.getElementById("addr_ko");
        addr_ko.value = addr + extra_addr;

        const postcode = document.getElementById("postcode");
        postcode.value = data.zonecode;

        // 영문주소
        let addr_en = ""; // 주소 변수
        let extra_addr_en = ""; // 참고항목 변수

        if (data.userSelectedType == "R") {
          // 사용자가 도로명 주소를 선택했을 경우
          addr_en = data.roadAddressEnglish;
        } else if (data.userSelectedType == "J") {
          // 사용자가 지번 주소를 선택했을 경우(J)
          addr_en = data.jibunAddressEnglish;
        }

        if (data.bname1English != "") {
          extra_addr = data.bname1English;
        }

        // 합치기
        if (extra_addr_en !== "") {
          extra_addr_en = " (" + extra_addr_en + ")";
        }
        console.log(addr_en + extra_addr_en);

        const addr_en_main = document.getElementById("addr_en");
        addr_en_main.value = addr_en + extra_addr_en;

        // const postcode = document.getElementById("postcode");
        // postcode.value = data.zonecode;

        // 커서를 상세주소 필드로 이동한다.
        document.getElementById("addr_ko_detail").focus();
      },
    }).open();
  });
});

// 연구개발 여부에 따른 표시
window.onload = function () {
  // 라디오 버튼을 선택하면 함수가 호출됩니다.
  document.getElementsByName("dev").forEach(function (elem) {
    elem.addEventListener("change", function () {
      var employeeCountRow = document.querySelector("#employee-count-row");

      // '있음'이 선택되면 인원수 항목을 표시하고, '없음'이 선택되면 숨깁니다.
      if (this.value === "yes") {
        employeeCountRow.style.display = "block";
      } else if (this.value === "no") {
        employeeCountRow.style.display = "none";
      }
    });
  });

  // 페이지가 로드될 때 인원수 항목을 숨깁니다.
  document.querySelector("#employee-count-row").style.display = "none";

  // 적용제외 여부에 따른 표시
  document.getElementsByName("exclusion").forEach(function (elem) {
    elem.addEventListener("change", function () {
      var exclusionReasonRow = document.querySelector("#exclusion_reason_row");

      // '있음'이 선택되면 인원수 항목을 표시하고, '없음'이 선택되면 숨깁니다.
      if (this.value === "yes") {
        exclusionReasonRow.style.display = "block";
      } else {
        exclusionReasonRow.style.display = "none";
      }
    });
  });

  // 페이지가 로드될 때 인원수 항목을 숨깁니다.
  document.querySelector("#exclusion_reason_row").style.display = "none";

  // 외주처리 여부에 따른 표시
  document.getElementsByName("outsourcing").forEach(function (elem) {
    elem.addEventListener("change", function () {
      var outsourcingRow = document.querySelector("#outsourcingRow");

      // '있음'이 선택되면 인원수 항목을 표시하고, '없음'이 선택되면 숨깁니다.
      if (this.value === "yes") {
        outsourcingRow.style.display = "block";
      } else {
        outsourcingRow.style.display = "none";
      }
    });
  });

  // 페이지가 로드될 때 인원수 항목을 숨깁니다.
  document.querySelector("#outsourcingRow").style.display = "none";

  // 건설면허 여부에 따른 표시
  document.getElementsByName("construction_license").forEach(function (elem) {
    elem.addEventListener("change", function () {
      var constructRow = document.querySelector("#construction_content_row");

      // '있음'이 선택되면 인원수 항목을 표시하고, '없음'이 선택되면 숨깁니다.
      if (this.value === "yes") {
        constructRow.style.display = "block";
      } else {
        constructRow.style.display = "none";
      }
    });
  });

  // 페이지가 로드될 때 인원수 항목을 숨깁니다.
  document.querySelector("#construction_content_row").style.display = "none";

  // 신규/전환에 따라 이전인증서 표시
  document.getElementsByName("ctype").forEach(function (elem) {
    elem.addEventListener("change", function () {
      var beforeCertRow = document.querySelector("#before_cert_row");

      // '있음'이 선택되면 인원수 항목을 표시하고, '없음'이 선택되면 숨깁니다.
      if (this.value === "전환") {
        beforeCertRow.style.display = "block";
      } else if (this.value === "신규") {
        beforeCertRow.style.display = "none";
      }
    });
  });
  // 페이지가 로드될 때 인원수 항목을 숨깁니다.
  document.querySelector("#before_cert_row").style.display = "none";
};

// 전화번호 입력시 하이픈 자동 입력
function formatCeoPhone(input) {
  var number = input.value.replace(/-/g, "");
  if (!/^\d+$/.test(number)) {
    input.value = null;
  } else {
    input.value =
      number.substring(0, 3) +
      "-" +
      number.substring(3, 7) +
      "-" +
      number.substring(7, 11);
  }
}

// 사업자번호 입력시 하이픈 자동 입력
function formatBizNo(input) {
  var number = input.value.replace(/-/g, "");
  if (!/^\d+$/.test(number)) {
    input.value = null;
  } else {
    input.value =
      number.substring(0, 3) +
      "-" +
      number.substring(3, 5) +
      "-" +
      number.substring(5, 10);
  }
}

// 전화번호 입력시 하이픈 자동 입력
function formatPhone(input) {
  var number = input.value.replace(/-/g, "");
  if (!/^\d+$/.test(number)) {
    input.value = null;
  } else {
    if (number.length == 10) {
      // e.g. 02-1234-5678
      input.value =
        number.substring(0, 2) +
        "-" +
        number.substring(2, 6) +
        "-" +
        number.substring(6, 10);
    } else if (number.length == 11) {
      // e.g. 031-123-4567 or 010-1234-5678
      if (number.substring(0, 2) == "02") {
        input.value =
          number.substring(0, 2) +
          "-" +
          number.substring(2, 5) +
          "-" +
          number.substring(5, 9);
      } else {
        input.value =
          number.substring(0, 3) +
          "-" +
          number.substring(3, 7) +
          "-" +
          number.substring(7, 11);
      }
    } else {
      // Handle other cases as needed
    }
  }
}
