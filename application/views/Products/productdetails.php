
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

        <div class="section-title">
          <h2>BBProducts</h2>
          <p>Product Details</p>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
			  <img src="<?=base_url();?>productimages/<?=$productdata->p_image;?>" width="250" height="250">
			  <input type="hidden" id="p_id" value="<?=$productdata->p_id;?>">
			</div>
          </div>
			 <div class="col-lg-6 col-md-6"><br />
				<table>
				<tbody>
				<tr>
				<td>Product Price : </td>
				<td><input type="text" name="p_price" class="input-border" value="<?=$productdata->p_price;?>" readonly></td>
				</tr>
				<tr>
				<td>Product Name : </td>
				<td><input type="text" name="p_name" class="input-border" value="<?=$productdata->p_name;?>" readonly></td>
				</tr>
				<tr>
				<td>Product SKU Code : </td>
				<td><input type="text" name="p_sku" id="p_sku" class="input-border" value="<?=$productdata->p_sku;?>" readonly></td>
				</tr>
				<tr>
				<td>Product Stock : </td>
				<td><input type="text" name="p_stock" id="p_stock" class="input-border" value="<?=$productdata->p_stock;?>" readonly></td>
				</tr>
				<tr>
				<td>Product Quantity : </td>
				<td><button class="btn btn-success bton" onclick="sub()"><i class="fa fa-minus"></i></button><input type="text" id="p_quantity" value="1"><button class="btn btn-success bton" onclick="add();"><i class="fa fa-plus"></i></button></td>
				</tr>
				</tbody>
				</table>
				<br />
			 
			  <?php if($this->session->userdata('logged_in')==TRUE) { ?>
			  <button class="btn btn-warning" onclick="addtocart()">Add to Cart</button>
			  <?php } else { ?>
			  <button class="btn btn-warning" onclick="login()">Add to Cart</button>
			  <?php } ?>
			</div>

      </div>
    </section>
    
  </main><!-- End #main -->
<script>
function add()
{
	var p_quantity = document.getElementById('p_quantity').value; 
	var p_stock = document.getElementById('p_stock').value; 
	var p_quantity = +p_quantity + +1;
	if(p_quantity>p_stock)
	{
		var p_quantity = +p_quantity + -1;
	}
	document.getElementById('p_quantity').value=p_quantity;
}
function sub()
{
	var p_quantity = document.getElementById('p_quantity').value;
	var p_quantity = +p_quantity + -1;
	if(p_quantity<=0)
	{
		var p_quantity = 1;
	}
	document.getElementById('p_quantity').value=p_quantity;
}
function addtocart()
{
	var p_id = document.getElementById('p_id').value; 
	var p_quantity = document.getElementById('p_quantity').value; 
	$.ajax({
				type: 'post',
				url: '<?=base_url();?>Products/addtocart',
				data: {p_id:p_id,p_quantity:p_quantity},
				success: function (result) 
				{
					document.getElementById('cart-count').innerHTML = result;
				}
			  });
}
function login()
{
	alert('Please Login!');
}
</script>
  