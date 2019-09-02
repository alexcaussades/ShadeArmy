var myWindow;
function openWin() {
  myWindow = window.open("https://alexcaussades.com/clients/shadearmy/freq.php", "", "width=800, height=600");
}

function popup() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

new ClipboardJS('.btn');