//파일첨부

const id_attach = document.getElementById("id_Attach");
const file = id_attach.files[0]; //팡리 한개만

const formData = new FormData();
formData.append("file", file);
