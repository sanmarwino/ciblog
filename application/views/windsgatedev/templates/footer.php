<?php if($this->session->has_userdata('logged_in')) { ?>
    </div>
</div>
<?php } else { ?>   
    </div>
</div>
<footer id="footer-color" class="container-fluid text-center">
	<div class="col-sm-12">
		<p>Wind’s Gate Philippine Software Development Inc.<a href="http://windsgate.com/" title="Visit Wind's Gate Philippines">windsgate.com</a></p>
	</div>
	<div class="col-sm-12">
		<a href="#" class="fa fa-facebook"></a>
		<a href="#" class="fa fa-twitter"></a>
		<a href="#" class="fa fa-google"></a>
		<a href="#" class="fa fa-linkedin"></a>
    </div>
    
</footer>
<?php } ?>
<script src="<?php echo base_url() ?>assets/js/customeff.js"></script>
<script>
    // CKEDITOR.replace('editor1' );

    // // When the user scrolls down 20px from the top of the document, show the button
    // window.onscroll = function() {scrollFunction()};
    
    // function scrollFunction() {
    //     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    //         document.getElementById("myBtn").style.display = "block";
    //     } else {
    //         document.getElementById("myBtn").style.display = "none";
    //     }
    // }
    
    // // When the user clicks on the button, scroll to the top of the document
    // function topFunction() {
    //     document.body.scrollTop = 0;
    //     document.documentElement.scrollTop = 0;
    // }
</script>
</body>
</html>