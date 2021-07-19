 let listen = document.getElementById('link');

//  function loadContent() {
//    //  window.alert("oui");
//     document.getElementById('spanShow').style.display = "block";
//    //  var img = new Image();   // Crée un nouvel élément img
//    //  img.src = 'assets/img/bg/bg6.jpg';
//     document.getElementById('backGImg').setAttribute("data-image-src", "assets/img/bg/bg6.jpg" );
//  }
//  listen.addEventListener('click', loadContent);
 
//  function loadBGPic() {
//     document.getElementById('reloadBGPic').setAttribute("data-image-src", "assets/perso/landing_1.jpg" );
//  }

 var btn = document.getElementsByClassName('btn btn-warning');
  btn.onClick = function(){
    alert('button is cliked');
  }
  function loadDiv_1() {
     if (document.getElementById('tabs-collapse').style.display = "none") {document.getElementById('tabs-collapse').style.display = "block";}
   document.getElementById('mapwrapper').style.display = "none";
   
   $(function(){
      $("#tabs-collapse").load("formulaire.html");
     });
  }

  function loadDiv_2() {
   document.getElementById('mapwrapper').style.display = "block";
   document.getElementById('tabs-collapse').style.display = "none";
  }


          // Open the Modal
          function openModal() {
            document.getElementById("myModal").style.display = "block";
            document.getElementById("page-top").style.overflow = "hidden";
            var divDisplayed = document.getElementsByClassName("displayed");
            for(var i=0;i<divDisplayed.length;i++)
                {
                    divDisplayed[i].style.display='none';
                }
          }
          
          // Close the Modal
          function closeModal() {
            document.getElementById("myModal").style.display = "none";
            document.getElementById("page-top").style.overflow = "scroll";
            var divDisplayed = document.getElementsByClassName("displayed");
            for(var i=0;i<divDisplayed.length;i++)
                {
                    divDisplayed[i].style.display='block';
                }
          }
          
          var slideIndex = 1;
          showSlides(slideIndex);
          
          // Next/previous controls
          function plusSlides(n) {
            showSlides(slideIndex += n);
          }
          
          // Thumbnail image controls
          function currentSlide(n) {
            showSlides(slideIndex = n);
          }
          
          function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
          }
  
    
//   $('#myModal').on('shown.bs.modal', function () {
//    $('#myInput').trigger('focus')
//  })
//  let a = document.getElementById("spanShow");
 
 
//  document.getElementsByClassName('tabtitle').addEventListener('click', function(){
//     window.alert("oui");
//     document.getElementsByClassName("spanShow").style.display = block;
// });

// document.getElementById('backGImg').setAttribute("data-image-src", "assets/img/bg/bg6.jpg");