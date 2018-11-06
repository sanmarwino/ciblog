<div class="container-fluid">
  <h2 class="text-center other-font-style">Get In Touch With Us<br><br></h2>
    
  <div class="row">
    <div class="col-sm-6 text-center new-font-style">
        <script src="<?php echo base_url(); ?>assets/js/greetings.js"></script>    
      <h4>Contact us and we'll get back to you within 24 hours.</h4>
      <p><span class="glyphicon glyphicon-map-marker"></span>M-III Doña Luisa Bldg. <br>&nbsp;&nbsp;&nbsp;Fuente Osmeña Circle<br>&nbsp;&nbsp;&nbsp;Cebu City 6000, Philippines</p>
      <p><span class="glyphicon glyphicon-phone"></span> (032) 416 0622</p>
      <p><span class="glyphicon glyphicon-envelope"></span> mjvasquez08@gmail.com</p>
    </div>
      
    
    <div class="col-sm-6 ">
  <form id="cntForm" method="post" action="<?php echo base_url(); ?>index.php/email" >	
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div> 
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-primary pull-left" type="submit" >Send</button>
        </div>
    </div>
  </form>
    </div>
</div>
    
    <div class="col-sm-12 embed-responsive embed-responsive-16by9" id="googleMap">
          <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.3920789500385!2d123.89148085044468!3d10.310473470404057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a9994ee4ef1e1d%3A0x99d9c443a5dbfb0a!2sDona+Luisa+Bldg.!5e0!3m2!1sen!2sph!4v1527132648685" width="100%" height="400"  allowfullscreen></iframe>
    </div>
</div>
 	
<script>
      var form = document.getElementById("myForm");
      form.onsubmit = function(){
        form.reset();
      }
</script>


    