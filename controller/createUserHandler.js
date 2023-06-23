document.addEventListener("DOMContentLoaded", function () {
  const btn_create_user = document.getElementById("btn_create_user");

  btn_create_user.addEventListener("click", function () {
    // alert("create_user");
    const form = document.forms["create_user_form"];
    const name = form["name"].value;
    const email = form["email"].value;
    const pwd = form["pwd"].value;
    const role = form["role"].value;
    console.log(role);
    const zipcode = form["zip_code"].value;
    const addr_ko = form["addr_ko"].value;
    const addr_ko_detail = form["addr_ko_detail"].value;
    // qms_iaf_code checkbox의 값들을 가져오기
    const qms_iaf_code_checkboxes = form["qms_iaf_code"];
    let qms_iaf_code_values = [];
    for (let i = 0; i < qms_iaf_code_checkboxes.length; i++) {
      if (qms_iaf_code_checkboxes[i].checked) {
        qms_iaf_code_values.push(qms_iaf_code_checkboxes[i].value);
      }
    }

    console.log(qms_iaf_code_values); // 선택된 체크박스 값들을 출력
  });
});
