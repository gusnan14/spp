<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/modal.css">
    <title>Document</title>
</head>
<body>

<div class="backround-popup" id="backround-popup">
    <button disabled></button>
</div>
<div class="popup" id="popup">
    <img src="../asset/icon/triangle-exclamation-solid.svg" class="img">
    <h2>Peringatan!</h2>
    <p>Apakah anda yakin menghapus data tersebut?</p>
    <div class="button">
        <a href="" class="btn-ok" id="deleteBtn">Delete</a>
        <button class="btn-close" onclick="closePopup()">Close</button>
    </div>
</div>

</body>
</html>
