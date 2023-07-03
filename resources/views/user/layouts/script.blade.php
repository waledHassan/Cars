<!-- Jquery Slim JS -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- Meanmenu JS -->
<script src="assets/js/jquery.meanmenu.js"></script>
<!-- Owl Carousel JS -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- Jquery Appear JS -->
<script src="assets/js/jquery.appear.js"></script>
<!-- Odometer JS -->
<script src="assets/js/odometer.min.js"></script>
<!-- Nice Select JS -->
<script src="assets/js/nice-select.min.js"></script>
<!-- Popup JS -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- Slick JS -->
<script src="assets/js/slick.min.js"></script>
<!-- Jquery Ui JS -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Ajaxchimp JS -->
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<!-- Form Validator JS -->
<script src="assets/js/form-validator.min.js"></script>
<!-- Contact JS -->
<script src="assets/js/contact-form-script.js"></script>
<!-- Wow JS -->
<script src="assets/js/wow.min.js"></script>
<!-- Custom JS -->
<?php 
            if(isset($scripts) && count($scripts)){
                foreach($scripts as $script){
                    echo " <script src=\"assets/js/{$script}.js\"></script>";
                }
            }
        ?>
<script src="assets/js/main.js"></script>

<script>
    // Set the date we're counting down to //
    var countDownDate = new Date("Nov 5, 2023 15:37:25").getTime();

    // Update the count down every 1 second

</script>



</body>

</html>