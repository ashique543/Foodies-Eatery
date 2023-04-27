let val=1

function click_radio() {
    var elements = document.getElementsByTagName("input");
  if(val==6){
    val=1
  }
for (i = 0; i < elements.length; i++) {
    if (elements[i].value == val) {
        elements[i].click();
    }
}
  val=val+1
}

setInterval(function() {
    click_radio();      // does some work
}, 3000);