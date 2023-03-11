function openPopup() {
    let popup = document.getElementById("popup");
    const sidebar = document.getElementById("sidebar");
    const backround_popup = document.getElementById("backround-popup");

        popup.classList.add("openpopup");
        sidebar.classList.add("z-index-blur");
        backround_popup.classList.add("blur");
    }
    function closePopup() {
        const sidebar = document.getElementById("sidebar");
        const backround_popup = document.getElementById("backround-popup");
        
        popup.classList.remove("openpopup");
        sidebar.classList.remove("z-index-blur");
        backround_popup.classList.remove("blur");
    }
    function closePopup2() {
        const data = document.getElementById('popupLogin')
        data.style.display="none";
    }
