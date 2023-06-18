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
