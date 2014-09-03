<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_product.php'); ?>
</div>
<div class="rightcontainer">
	<div class="breadcrumb">home &raquo; product &raquo; <?php echo $product->sub_category->category->name; ?> &raquo; <?= $product->sub_category->name; ?> &raquo; <?= $product->name; ?>
	</div>
	<div class="titleCategory"><?= $product->sub_category->name; ?>
	</div>
	<div id="productDetail_top">
		<div class="productName">
			<?= $product->name ?>
		</div>
		<div id="downloadContainer">
			<ul id="downloadbuttons">
						<?php if (empty($product->cad) || $product->cad == '') {?>
                       
                        <?php }else { ?>
                        <li class="cad"><a href="<?php echo base_url();?><?= $product->cad ?>" target="_blank"></a></li>
                        <?php }?>

						<?php if (empty($product->catalog) || $product->catalog == '') {?>
                       
                        <?php }else { ?>
                        <li class="catalog"><a href="<?php echo base_url();?><?= $product->catalog ?>" target="_blank"></a></li>
                        <?php }?>

                        <?php if (empty($product->manual) || $product->manual == '') {?>
                        
                        <?php }else { ?>
                        <li class="manual"><a href="<?php echo base_url();?><?= $product->manual ?>" target="_blank"></a></li>
                        <?php }?>                     
						
						<?php if (empty($product->software) || $product->software == '') {?>
                        
                        <?php }else { ?>
                        <li class="software"><a href="<?php echo base_url();?><?= $product->software ?>" target="_blank"></a></li>
                        <?php }?>  
			</ul>
		</div>
	</div>

	<div id="productDetail_container">

	<div class="photos">	
		<div id="photo_1" ><!--a href="JavaScript:popup_img( )"--><img src="<?= $product->image ?>" border="0" width="205" height="205"></div>
		<div id="photo_2" style="display:none;"><!--a href="JavaScript:popup_img( )"--><img src="<?= $product->subimage1 ?>" border="0" width="205" height="205"></div>
		<div id="photo_3" style="display:none;"><!--a href="JavaScript:popup_img( )"--><img src="<?= $product->subimage2 ?>" border="0" width="205" height="205"></div>
		<div id="photo_4" style="display:none;"><!--a href="JavaScript:popup_img( )"--><img src="<?= $product->subimage3 ?>" border="0" width="205" height="205"></div>
		<ul class="thumbs">
			
                        <?php if (empty($product->image) || $product->image == '') {?>
                       
			<?php }else { ?>
                        <li><a href="javascript:void(0)" onclick="switch_product_img('photo_1', 4);"><img src="<?= $product->image ?>" border="0" width="65" height="65"></a></li>
                        <?php }?>

                        <?php if (empty($product->subimage1) || $product->subimage1 == '') {?>
                        
			<?php }else { ?>
                        <li><a href="javascript:void(0)" onclick="switch_product_img('photo_2', 4);"><img src="<?= $product->subimage1 ?>" border="0" width="65" height="65"></a></li>
                        <?php }?>


                        <?php if (empty($product->subimage2) || $product->subimage2 == '') {?>
                        
			<?php }else { ?>
                        <li><a href="javascript:void(0)" onclick="switch_product_img('photo_3', 4);"><img src="<?= $product->subimage2 ?>" border="0" width="65" height="65"></a></li>
                        <?php }?>

                        <?php if (empty($product->subimage3) || $product->subimage3 == '') {?>
                       
			<?php }else { ?>
                        <li><a href="javascript:void(0)" onclick="switch_product_img('photo_4', 4);"><img src="<?= $product->subimage3 ?>" border="0" width="65" height="65"></a></li>
                        <?php }?>
                        
		</ul>
	</div>

		<script language="javascript" type="text/javascript">
		function switch_product_img(divName, totalImgs) {
			for (var i=1; i<=totalImgs; i++) {
				var showDivName = 'photo_' + i;
				var showObj = document.getElementById(showDivName);
				if (showDivName == divName)
					showObj.style.display = 'block';
				else
					showObj.style.display = 'none';
				}
			}
		</script>
		

<script type="text/javascript" src="http://yui.yahooapis.com/2.5.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.0/build/element/element-beta-min.js"></script>
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.0/build/connection/connection-min.js"></script>
	<script type="text/javascript" src="http://yui.yahooapis.com/2.5.0/build/tabview/tabview-min.js"></script>

		<div id="tab_cotainer">			

			<script type="text/javascript">
			var myTabs = new YAHOO.widget.TabView("content-explorer");
			</script>

			<div id="content-explorer">
				
				<ul class="yui-nav">

                                        <?php if (empty($product->features) || $product->features == '') {?>
                                        <div></div>
                                        <?php }else { ?>
                                        <li class="selected"><a href="#">features</a></li>
                                        <?php }?>

                                        <?php if (empty($product->specifications) || $product->specifications == '') {?>
                                        <div></div>
                                        <?php }else { ?>
                                        <li><a href="#">Specification</a></li>
                                        <?php }?>

					<?php if (empty($product->dimensions) || $product->dimensions == '') {?>
                                        <div></div>
                                        <?php }else { ?>
                                        <li><a href="#">Dimensions</a></li>
                                        <?php }?>
					
				</ul>
				
				<div class="clear"></div>
					
				<div class="yui-content">

                                        <?php if (empty($product->features) || $product->features == '') {?>
                                        <div></div>
                                        <?php }else { ?>
                                        <div><?= $product->features ?></div>
                                        <?php }?>
					
                                        <?php if (empty($product->specifications) || $product->specifications == '') {?>
                                        <div></div>
                                        <?php }else { ?>
                                        <div><?= $product->specifications ?></div>
                                        <?php }?>

                                        <?php if (empty($product->dimensions) || $product->dimensions == '') {?>
                                        <div></div>
                                        <?php }else { ?>
                                        <div><?= $product->dimensions ?></div>
                                        <?php }?>
					
				</div>			
			</div>	
		</div>

		<? if ($product->rpImg1 || $product->rpImg2 || $product->rpImg3 || $product->rpImg4) {
		?>
		<div class="relatedContainer" style="width:510px; margin-top:30px; float:right;">
			<div style="width:485px; height:25px; border-bottom:1px solid #ccc; text-transform:uppercase; color:#000; font-size:12px; text-align:left; padding-left:10px; margin-bottom:25px; font-weight:bold;">
			Related Accessories
			</div>
			<div style="width:120px; float:left; text-align:center;">
					<?php if ($product->rpImg1) { ?><img src="<?php echo $product->rpImg1; ?>" width="100"><br><?php }?>
					<b><?php echo $product->rpName1; ?></b><br>
					<?php if ($product->rpDown11 || $product->rpDown12) {?>Download: <?php }?>
					<?php if ($product->rpDown11) { ?><a href="<?php echo $product->rpDown11; ?>" target="_blank">PDF</a><?php }?>
					<?php if ($product->rpDown12) { ?><a href="<?php echo $product->rpDown12; ?>" target="_blank">AI</a><?php }?>					
			</div>
			<div style="width:120px; float:left; text-align:center;">
					<?php if ($product->rpImg2) { ?><img src="<?php echo $product->rpImg2; ?>" width="100"><br><?php }?>
					<b><?php echo $product->rpName2; ?></b><br>
					<?php if ($product->rpDown21 || $product->rpDown22) { ?>Download: <?php }?>
					<?php if ($product->rpDown21) { ?><a href="<?php echo $product->rpDown21; ?>" target="_blank">PDF</a><?php }?>
					<?php if ($product->rpDown22) { ?><a href="<?php echo $product->rpDown22; ?>" target="_blank">AI</a><?php }?>
			</div>
			<div style="width:120px; float:left; text-align:center;">
					<?php if ($product->rpImg3) { ?><img src="<?php echo $product->rpImg3; ?>" width="100"><br><?php }?>
					<b><?php echo $product->rpName3; ?></b><br>
					<?php if ($product->rpDown31 || $product->rpDown32) { ?>Download: <?php }?>
					<?php if ($product->rpDown31) { ?><a href="<?php echo $product->rpDown31; ?>" target="_blank">PDF</a><?php }?>
					<?php if ($product->rpDown32) { ?><a href="<?php echo $product->rpDown32; ?>" target="_blank">AI</a><?php }?>
			</div>
			<div style="width:120px; float:left; text-align:center;">
					<?php if ($product->rpImg4) { ?><img src="<?php echo $product->rpImg4; ?>" width="100"><br><?php }?>
					<b><?php echo $product->rpName4; ?></b><br>
					<?php if ($product->rpDown41 || $product->rpDown42) { ?>Download: <?php }?>
					<?php if ($product->rpDown41) { ?><a href="<?php echo $product->rpDown41; ?>" target="_blank">PDF</a><?php }?>
					<?php if ($product->rpDown42) { ?><a href="<?php echo $product->rpDown42; ?>" target="_blank">AI</a><?php }?>
			</div>
		</div>
		<?php }?>

	</div>
	<div class="productDetail_bottom">
	</div>
</div>