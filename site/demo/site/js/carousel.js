
var myCarIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myCarIndex++;
  if (myCarIndex > x.length) {myCarIndex = 1;}    
  x[myCarIndex-1].style.display = "block";  
  setTimeout(carousel, 500); // Change image every 1/2 second
}

