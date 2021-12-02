


// login modal appear
document.getElementById('js-login').addEventListener('click',function(){
  document.getElementById('js-login-modal').style.display = 'block'
  document.getElementById('js-nav').style.background = 'rgba(0,0,0,0.01)'
})
document.getElementById('js-login-modal').addEventListener('click',function(){
  document.getElementById('js-login-modal').style.display = 'none'
  document.getElementById('js-nav').style.background = '#e64057'
})
document.getElementById('js-form').addEventListener('click',function(event){
  event.stopPropagation()
})




// scroll smooth
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})



// statisical month index.html
var colors = ['#e64057','#993348','#fa938a','#eb6d88', '#01c06e', '#c1e4c1', '#019e5c'];

var chLineMonth= document.getElementById("chLine-month");
var chartData = {
  labels: ["THÁNG 1", "THÁNG 2", "THÁNG 3", "THÁNG 4", "THÁNG 5", "THÁNG 6", "THÁNG 7", "THÁNG 8","THÁNG 9", "THÁNG 10", "THÁNG 11", "THÁNG 12"],
  datasets: [{
    data: [420, 690, 526, 541, 720, 714, 678, 594, 630, 677, 680,750],
    backgroundColor: colors[6],
    borderColor: colors[6],
    borderWidth: 5,
    label: "Tổng đơn hàng",
  },]
};

if (chLineMonth) {
  new Chart(chLineMonth, {
  type: 'line',
  data: chartData,
  options: {
      plugins: {
         legend: {
            labels: {
               font: {
                  size: 20,
                  color:"#000"
               }
            }
         }
      }
   }
     });
}
