document.addEventListener("DOMContentLoaded", function () {
  const btn_login = document.getElementById("btn_login");

  btn_login.addEventListener("click", function () {
    // alert("login");
    const login_email = document.getElementById("login_email");
    const login_pwd = document.getElementById("login_pwd");

    if (login_email.value == "") {
      alert("이메일을 입력하세요.");
      login_email.focus();
      return false;
    }
    if (login_pwd.value == "") {
      alert("비밀번호를 입력하세요.");
      login_pwd.focus();
      return false;
    }

    // fetch를 이용해서 서버에 전송
    const data = new FormData();
    data.append("login_email", login_email.value);
    data.append("login_pwd", login_pwd.value);

    fetch("./controller/login.php", {
      method: "POST",
      body: data,
    })
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        if (data.result == "login_fail") {
          alert("아이디 또는 비밀번호가 일치하지 않습니다.");
          login_email.value = "";
          login_pwd.value = "";
          login_email.focus();
        } else if (data.result == "login_success") {
          alert("로그인 성공");
          location.href = "./index.php";
        }
      })
      .catch((error) => {
        console.error("error:", error);
        alert("서버 통신 오류");
      });
  });
});
