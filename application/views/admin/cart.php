		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body" id="cart_qty">
					
				</div>
			</div>
			
		</div><!--/.col-->
		<div class="col-md-4">
				<div class="panel-body">
					<form class="form-horizontal" method="post" id="testForm">
						<fieldset>
							<!-- Name input-->
							<div class="form-group">
								<div class="col-md-12">
									<select id="pid" name="pid" class="form-control" onchange="myCustFun('<?php echo base_url();?>ict/get_pcode/'+this.value,'scate')">
										<option>Select product code</option>
										<?php foreach ($products as $v):?>
											<option value="<?php echo $v->pid; ?>"><?php echo $v->pcode; ?></option>
										<?php endforeach; ?>
									</select>
									<span style="color: red;"><?php echo form_error("pid"); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12" id="scate">
									
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<input id="punit" name="punit" type="text" class="form-control" placeholder="unit price">
									<span style="color: red;"><?php echo form_error("punit"); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<input id="pvat" name="pvat" placeholder="vat amount" type="text" class="form-control">
									<span style="color: red;"><?php echo form_error("pvat"); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<input id="pdiscount" name="pdiscount" type="text" placeholder="discount" class="form-control">
									<span style="color: red;"><?php echo form_error("pdiscount"); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<input id="qty" name="quantity" type="text" placeholder="quantity" class="form-control">
									<span style="color: red;"><?php echo form_error("quantity"); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">

									<select id="pcolor" name="pcolor" class="form-control">
										<option>Select color</option>
										<?php foreach ($products as $v):?>
											<option value="<?php echo $v->color; ?>"><?php echo $v->color; ?></option>
										<?php endforeach; ?>
									</select>
									<span style="color: red;"><?php echo form_error("pcolor"); ?></span>
								</div>
							</div>
							
							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-12 widget-right">
									<button onclick="addToCart('<?php echo base_url();?>ict/addtocart')" type="submit" class="btn btn-default btn-md pull-right">Submit</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->

	  <script type="text/javascript">
	//Ajax dynamic function
	function myCustFun(url,previewid) {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            document.getElementById(previewid).innerHTML = xmlhttp.responseText;
	        }
	    };
	    xmlhttp.open("GET", url, true);
	    xmlhttp.send();
	}

var base_url = '<?php echo base_url(); ?>';

	function addToCart(url){
		//alert(base_url);
		var pid = $("#pid").val();
		var pvat = $("#pvat").val();
		var qty = $("#qty").val();
		var punit = $("#punit").val();
		var pdiscount = $("#pdiscount").val();
		var pcolor = $("#pcolor").val();
		$.ajax({
			type:'POST',
			url: url,
			data:{'pid':pid,'pvat':pvat,'qty':qty,'punit':punit,'pdiscount':pdiscount,'pcolor':pcolor},
			datatype: 'text',
			success:function(data){
					$("#cart_qty").text(parseInt(data));
					//alert(data);
					displayCartItem(base_url+'ict/cart_product');
			}
		});
	}

	function displayCartItem(url,prew){
	//alert("hello");
	$.ajax({
			type:'POST',
			url: url,
			data:'',
			datatype: 'html',
			success:function(data){
				$("#cart_qty").html(data);
			}
		});
	}
    displayCartItem(base_url+'ict/cart_product');

</script>