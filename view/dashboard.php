<?php 
// include "../template/head.php";
include "../template/sidebar.php";
if (!@$_SESSION['username']) {
    echo "<script>alert('Anda Belum Login');window.location ='../login.php';</script>";
}
if ($_SESSION['isLogin']==1) { ?>
    <div class="backround-popupLogin" id="backround-popup">
        <button disabled></button>  
    </div>
    <div class="popupLogin" id="popupLogin">
        <img src="../asset/icon/triangle-exclamation-solid.svg" class="img">
        <h2>Peringatan!</h2>
        <p>Berhasil Login <?= $_SESSION['username']?> !</p>
        <div class="buttonLogin">
            <button class="btn-closeLogin" onclick="closePopup2()">Close</button>
        </div>
    </div>
    <?php
    $_SESSION['isLogin']=0;
}
?> 
    <?php 
    include "../template/navbar.php";
    include "../template/konten.php";
    ?>
    </div>
   <!-- connect javascript -->
    <!-- <script src="../asset/js/script.js"></script> -->
</body>
</html>

