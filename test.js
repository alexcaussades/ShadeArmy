

  function copy() {
	  var copyText = document.querySelector("#ban");
	  copyText.button();
	  document.execCommand("copy");
	  console.log("text copier" + copyText);
  }
  
  


  function copy2() {
    var copyText = document.querySelector("#timeout");
    copyText.select();
    newFunction();
    console.log("text copier" + copyText);
    }
    

document.querySelector("#copyban").addEventListener("click", copy);
document.querySelector("#copytimeout").addEventListener("click", copy);

function newFunction() {
  document.execCommand("copy");
}
