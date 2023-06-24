document.addEventListener('DOMContentLoaded', function () {
  const btn_create_user = document.getElementById('btn_create_user');
  btn_create_user.addEventListener('click', function () {
    // 유효성 검사

    if (document.getElementById('name').value == '') {
      alert('이름을 입력해주세요.');
      return;
    }
    if (document.getElementById('email').value == '') {
      alert('이메일을 입력해주세요.');
      return;
    }
    if (document.getElementById('pwd').value == '') {
      alert('비밀번호를 입력해주세요.');
      return;
    }
    if (document.querySelector('input[name="role"]:checked') == null) {
      alert('역할을 선택해주세요.');
      return;
    }

    //
    const name = document.getElementById('name').value;
    console.log(name);
    const email = document.getElementById('email').value;
    const pwd = document.getElementById('pwd').value;
    const role = document.querySelector('input[name="role"]:checked').value;
    console.log(role);
    // const zipcode = document.getElementById('zip_code').value;
    // const add_ko = document.getElementById('add_ko').value;
    // const add_ko_detail = document.getElementById('add_ko_detail').value;

    // 체크박스로 되어 있는 qms_iaf_code의 name속성을 이용해서 체크된 값들을 가져온다.
    const qms_iaf_code = document.getElementsByName('qms_iaf_code');
    let qms_iaf_code_value = [];
    for (let i = 0; i < qms_iaf_code.length; i++) {
      if (qms_iaf_code[i].checked == true) {
        qms_iaf_code_value.push(qms_iaf_code[i].value);
      }
    }
    console.log(qms_iaf_code_value);

    // 체크박스로 되어 있는 ems_iaf_code의 name속성을 이용해서 체크된 값들을 가져온다.
    const ems_iaf_code = document.getElementsByName('ems_iaf_code');
    let ems_iaf_code_value = [];
    for (let i = 0; i < ems_iaf_code.length; i++) {
      if (ems_iaf_code[i].checked == true) {
        ems_iaf_code_value.push(ems_iaf_code[i].value);
      }
    }
    console.log(ems_iaf_code_value);

    // 체크박스로 되어 있는 ems_iaf_code의 name속성을 이용해서 체크된 값들을 가져온다.
    const ohsms_iaf_code = document.getElementsByName('ohsms_iaf_code');
    let ohsms_iaf_code_value = [];
    for (let i = 0; i < ohsms_iaf_code.length; i++) {
      if (ohsms_iaf_code[i].checked == true) {
        ohsms_iaf_code_value.push(ohsms_iaf_code[i].value);
      }
    }
    console.log(ohsms_iaf_code_value);

    document.create_user_form.submit();
  });
});
