<style>
  #p_quantity{
	  width:60px;
	  height:35px;
	  text-align:center;
  }
  .bton{
	  margin-top : -5px;
	  height:35px;
  }
  .input-border{
	  border:none;
  }
  tr{
	  height:50px;
  }
  </style>
  <main id="main">
<br />
  <section id="services" class="services">
      <div class="container aos-init aos-animate" data-aos="fade-up">
		<input type="hidden" id="u_id" value="<?=$this->session->userdata('u_id');?>">
        <div class="section-title">
          <h2>Order Products</h2>
          <p>My Orders</p>
        </div>

        <div class="row" id="rowdata">
        <?php if(!empty($orders)) { ?>
		 <table class="table table-bordered">
		 <thead>
		 <th>Order No</th>
		 <th>Order Product</th>
		 <th>Product Quantity</th>
		 <th>Price</th>
		 <th>Order Date</th>
		 </thead>
		 <tbody id="cartdata">
		 <?php $i = 1;foreach($orders as $cart){ ?>
		 <tr>
		 <td><?=$i;?></td>
		 <td><?=$cart['p_name'];?></td>	
		 <td><?=$cart['p_quantity'];?></td>				
		 <td><?=$cart['p_price']*$cart['p_quantity'];?></td>
		 <td><?=$cart['order_date'];?></td>	
		  </tr>
		<?php $i++;} ?>
		 </tbody>
		 </table>
		<?php } else { ?>
		<div class="col-md-12">
		<center>
		<img src="<?=base_url();?>images/logo.png" width="200" height="200">
		<h4>Your Order is Empty! Please Login!</h4><br />
		</center>
		</div>
		<?php } ?>
		</div>
		
    </section>
    
  </main><!-- End #main -->
