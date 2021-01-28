
  
  <main id="main">

   
    <br />
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>List</h2>
          <p>Our Products</p>
        </div>

        <div class="row" id="webproduct">
			<?php
			if(!empty($product)) {
				$product = $product->result_array();
				foreach($product as $product) {
			?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="<?=base_url();?>productimages/<?=$product['p_image'];?>" alt="<?=$product['p_image'];?>" width="250" height="250">
                <div class="social">
                  <a href="<?=base_url();?>Products/productdetails/<?=$product['p_id']?>"><i class="icofont-eye"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?=$product['p_price'];?></h4>
                <span><b><?=$product['p_name'];?></b></span>
              </div>
            </div>
          </div>
			<?php } } else { ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="<?=base_url();?>images/logo.jpg" class="img-fluid" alt="">
                <div class="social">
                   <a href="<?=base_url();?>"><i class="icofont-eye"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Product Will Update Soon..</h4>
                <span>Product will update Soon..</span>
              </div>
            </div>
          </div>
			<?php } ?>
         
          

        </div>
		

      </div>
    </section><!-- End Team Section -->
	<input type="hidden" id="start" value="2">
    <center><button class="btn btn-success" onclick="loadajax()">Load More</button></center><br />
  </main><!-- End #main -->
<script>
function loadajax()
{
	var start = document.getElementById("start").value; 
	var webproduct = document.getElementById("webproduct");
	$.ajax({
			type: 'post',
			url: '<?=base_url();?>Products/loadajax',
			data: {start:start},
			success: function (result) 
			{
			 var obj = JSON.parse(result);
			 for(var i=0;i<obj.length;i++)
			 {				 
				 webproduct.innerHTML += '<div class="col-lg-3 col-md-6 d-flex align-items-stretch">'+
											'<div class="member" data-aos="fade-up" data-aos-delay="100">'+
												'<div class="member-img">'+
													'<img src="<?=base_url();?>Userfiles/'+obj[i].p_image+'" alt="" width="250" height="250">'+
														'<div class="social">'+
															'<a href="<?=base_url();?>BBProducts/productdetails/'+obj[i].p_id+'"><i class="icofont-eye"></i></a>'+
														'</div>'+
												'</div>'+
												'<div class="member-info">'+
													'<h4>'+obj[i].p_price+'</h4>'+
													'<span><b>'+obj[i].p_name+'</b></span>'+
												'</div>'+
											'</div>'+
											'</div>'; 
			 }
			 var end = obj.length;
			 var sum = +start + +end; 
	         document.getElementById("start").value = sum;
			}
		  });
	
}
</script>
  