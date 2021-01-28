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
          <h2>Cart Products</h2>
          <p>Cart Details</p>
        </div>

        <div class="row" id="rowdata">
        <?php if(!empty($cartitems)) { ?>
		 <table class="table table-bordered">
		 <thead>
		 <th>Cart No</th>
		 <th>Cart Item</th>
		 <th>Quantity</th>
		 <th>Price</th>
		 <th>Remove Cart Item</th>
		 </thead>
		 <tbody id="cartdata">
		 <?php $i = 1;foreach($cartitems as $cart){ ?>
		 <tr>
		 <td><?=$i;?></td>
		 <td style="display:none"><?=$cart['p_id'];?></td>
		 <td><?=$cart['p_name'];?></td>	
		 <td><?=$cart['p_quantity'];?></td>				
		 <td><?=$cart['p_price']*$cart['p_quantity'];?></td>
		 <td style="display:none"><?=$cart['c_id'];?></td>
		 <td><a onclick="removecartitem(<?=$cart['c_id'];?>)" class="btn btn-danger"><strong>X</strong></a></td>
		 </tr>
		<?php $i++;} ?>
		 </tbody>
		 </table>
		 <center><button class="btn btn-success" onclick="checkout();">Checkout</button></center>
		<?php } else { ?>
		<div class="col-md-12">
		<center>
		<img src="<?=base_url();?>images/logo.png" width="200" height="200">
		<h4>Your Cart is Empty! Please Login!</h4><br />
		</center>
		</div>
		<?php } ?>
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
function removecartitem(c_id)
{
	var cartdata = document.getElementById("cartdata");
	var u_id = document.getElementById('u_id').value;
	cartdata.innerHTML = '';
	$.ajax({
				type: 'post',
				url: '<?=base_url();?>Products/Cartdata',
				data: {c_id:c_id,u_id:u_id},
				success: function (result) 
				{ 					
					var obj = JSON.parse(result); 
					var j = 1;
					if(obj.length>0)
					{
						for(var i=0;i<obj.length;i++)
						{ 
							cartdata.innerHTML += ' <tr><td>'+j+'</td><td>'+obj[i].p_name+'</td>'+
													'<td>'+obj[i].p_quantity+'</td>'+				
													'<td>'+obj[i].p_price+'</td>'+
													'<td><a onclick="removecartitem('+obj[i].c_id+')" class="btn btn-danger"><strong>X</strong></a></td>'+
													'</tr>';
							j++;
						}
						document.getElementById('cart-count').innerHTML = obj.length;
					}
					else
					{
						var rowdata = document.getElementById('rowdata');
						rowdata.innerHTML = '';
						rowdata.innerHTML += '<div class="col-md-12"><center>'+
												'<img src="<?=base_url();?>images/logo.png" width="200" height="200">'+
												'<h4>Your Cart is Empty! Please Login!</h4><br /></center></div>';
						document.getElementById('cart-count').innerHTML = obj.length;
					}
				}
			});
}
function checkout()
{
	var array = [];
	var oTable = document.getElementById('cartdata');
    var rowLength = oTable.rows.length;  
    for (i = 0; i < rowLength; i++)
	{
       var oCells = oTable.rows.item(i).cells;
       var cellLength = oCells.length; 
       for(var j = 0; j < cellLength; j++)
	   {
		  var cellVal = oCells.item(j).innerHTML;
		  array.push(cellVal);
       }
	   $.ajax({
				type: 'post',
				url: '<?=base_url();?>Products/Orders',
				data: {array_1 : array},
				success: function (result) 
				{ 	
					
				}
	       });
		array = [];
    }
	alert('Your Order details accepted successfully!');
	location.reload();
}
</script>
  
  