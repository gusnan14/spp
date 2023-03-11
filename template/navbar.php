<div class="navbar-top">
    <div class="person" onclick="openLogout()">
        <img src="../asset/icon/user.svg" class="icon-user">
        <span class="name-person"><?= $_SESSION['username']?></span>
        
        <img src="../asset/icon/drop-down.svg" class="icon-user">
    </div>
    <div class="dropdown" id="drpdwn">
        <button><a href="../logout.php">Keluar</a></button>
    </div>
</div>

<script>
    let dropdown = document.getElementById("drpdwn");

    function openLogout() {
        dropdown.classList.toggle('dropdown-open');
    }
</script>