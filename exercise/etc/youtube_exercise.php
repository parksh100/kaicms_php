<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="./exercise.js"></script>
    <title>php연습 </title>
</head>

<body>
    // 파일 업로드 기능 구현 연습 ajax

    <div class='container'>
        <form action="board_process.php" method="post" enctype="multipart/form-data">
            <div class="mt-5">
                <input type="file" name="attach" id="id_attach" class="form-control">
            </div>
            <div class="mt-5">
                <input type="submit" value="업로드" class="btn btn-primary" id="btn_submit">
        </form>
    </div>
</body>

</html>