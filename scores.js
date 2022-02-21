let timeoutID = null;
let filename = 'scores.txt'

function print(filename) {
  
  const scores = document.getElementById("scores");
  
  // refresh 10,000 milliseconds
  timeoutID = setTimeout(print, 10000);
  
  // recieve scores and display them
  $.ajax({
      url: "scores.txt",
      dataType: "text",
      success: function (data){
        scores.innerHTML = data;
      }
  });

}

function force_print() {
  
  //stop printing
  clearTimeout(timeoutID);
  
  print(filename);
}

function redirect(){
  window.location.replace("welcome.php");
}