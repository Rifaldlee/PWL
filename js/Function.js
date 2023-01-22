function MovePage(){window.location.href="ProductPage.html"}

function readMore1(){
  document.getElementById('description1').style.display = 'none';
  document.getElementById('read-more1').style.display = 'none';
  document.getElementById('more-description1').style.display = 'block';
  document.getElementById('close-button1').style.display = 'block';
    }
function close1(){
  document.getElementById('description1').style.display = 'block';
  document.getElementById('read-more1').style.display = 'block';
  document.getElementById('more-description1').style.display = 'none';
  document.getElementById('close-button1').style.display = 'none';
}
function readMore2(){
  document.getElementById('description2').style.display = 'none';
  document.getElementById('read-more2').style.display = 'none';
  document.getElementById('more-description2').style.display = 'block';
  document.getElementById('close-button2').style.display = 'block';
  }
function close2(){
  document.getElementById('description2').style.display = 'block';
  document.getElementById('read-more2').style.display = 'block';
  document.getElementById('more-description2').style.display = 'none';
  document.getElementById('close-button2').style.display = 'none';
}
function readMore3(){
  document.getElementById('description3').style.display = 'none';
  document.getElementById('read-more3').style.display = 'none';
  document.getElementById('more-description3').style.display = 'block';
  document.getElementById('close-button3').style.display = 'block';
  }
function close3(){
  document.getElementById('description3').style.display = 'block';
  document.getElementById('read-more3').style.display = 'block';
  document.getElementById('more-description3').style.display = 'none';
  document.getElementById('close-button3').style.display = 'none';
}
function readMore4(){
  document.getElementById('description4').style.display = 'none';
  document.getElementById('read-more4').style.display = 'none';
  document.getElementById('more-description4').style.display = 'block';
  document.getElementById('close-button4').style.display = 'block';
  }
function close4(){
  document.getElementById('description4').style.display = 'block';
  document.getElementById('read-more4').style.display = 'block';
  document.getElementById('more-description4').style.display = 'none';
  document.getElementById('close-button4').style.display = 'none';
}
function readMore5(){
  document.getElementById('description5').style.display = 'none';
  document.getElementById('read-more5').style.display = 'none';
  document.getElementById('more-description5').style.display = 'block';
  document.getElementById('close-button5').style.display = 'block';
  }
function close5(){
  document.getElementById('description5').style.display = 'block';
  document.getElementById('read-more5').style.display = 'block';
  document.getElementById('more-description5').style.display = 'none';
  document.getElementById('close-button5').style.display = 'none';
}
function readMore6(){
  document.getElementById('description6').style.display = 'none';
  document.getElementById('read-more6').style.display = 'none';
  document.getElementById('more-description6').style.display = 'block';
  document.getElementById('close-button6').style.display = 'block';
  }
function close6(){
  document.getElementById('description6').style.display = 'block';
  document.getElementById('read-more6').style.display = 'block';
  document.getElementById('more-description6').style.display = 'none';
  document.getElementById('close-button6').style.display = 'none';
}
function readMore7(){
  document.getElementById('description7').style.display = 'none';
  document.getElementById('read-more7').style.display = 'none';
  document.getElementById('more-description7').style.display = 'block';
  document.getElementById('close-button7').style.display = 'block';
  }
function close7(){
  document.getElementById('description7').style.display = 'block';
  document.getElementById('read-more7').style.display = 'block';
  document.getElementById('more-description7').style.display = 'none';
  document.getElementById('close-button7').style.display = 'none';
}
function readMore8(){
  document.getElementById('description8').style.display = 'none';
  document.getElementById('read-more8').style.display = 'none';
  document.getElementById('more-description8').style.display = 'block';
  document.getElementById('close-button8').style.display = 'block';
  }
function close8(){
  document.getElementById('description8').style.display = 'block';
  document.getElementById('read-more8').style.display = 'block';
  document.getElementById('more-description8').style.display = 'none';
  document.getElementById('close-button8').style.display = 'none';
}

var faq = document.getElementsByClassName("faq-page");
var i;

for (i = 0; i < faq.length; i++) {
    faq[i].addEventListener("click", function() {
        /* untuk kelas "active", bagian tombol untuk mengkontrol panel  */
        this.classList.toggle("active");

        /* menyembunyikan atau menampilkan panel */
        var body = this.nextElementSibling;
        if (body.style.display === "block") {
            body.style.display = "none";
        } else {
            body.style.display = "block";
        }
    });
}

var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("slides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000); // Change image every 2 seconds
}