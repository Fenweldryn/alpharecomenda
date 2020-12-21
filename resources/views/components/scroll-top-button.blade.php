<div>
    
    
    <button onclick="topFunction()" id="myBtn" title="Ir para o topo" 
        class="hidden fixed bottom-5 right-7 z-50 bg-red-600 text-white p-5 rounded-md text-md hover:bg-red-300"
    ><i class="fas fa-chevron-up"></i></button>

    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0; // For Safari
          document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
</div>