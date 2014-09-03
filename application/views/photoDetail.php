<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_news.php'); ?>
</div>
<div class="rightcontainer">
	<div class="breadcrumb">home &raquo; News & Events &raquo; Photo Gallery
	</div>
	<div class="titleCategory">Photo Gallery
	</div>

	<div class="contentcontainer_top">
	</div>
	<div id="productDetail_container">
	    <div class="bnCategory"><img src="<?php echo base_url();?>/images/category/news.jpg" border="0"; ></div>
		<div class="listContainer">
		    <div class="listLine">
			</div>
			<div class="listTitle_s">
			title
			</div>
			<div class="contentTitle_b">
			<?= $photo->title;?>
			</div>
			<div class="dottedLine">
			</div>

			<div class="listTitle_s">
			date
			</div>
			<div class="contentFile">
			<?= $photo->photodate;?>
			</div>
			<div class="dottedLine">
			</div>		

			<div style="width:620px; border:1px #ccc solid; text-align:left; clear:both; padding:20px; margin:0px; ">
			<?= $photo->description;?>
			</div>
			<!-- List Contents end -->

			<div class="listLine">
			</div>

			<div class="button"><a href="/newsEvent/photo">back to list</a></div>

		</div>
	</div>
	<div class="contentcontainer_bottom">
	</div>

</div>