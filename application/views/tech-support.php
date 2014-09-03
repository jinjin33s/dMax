<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_news.php'); ?>
</div>
<div class="rightcontainer">
	<div class="breadcrumb">home &raquo; Support &raquo; Technical Support
	</div>
	<div class="titleCategory">Technical Support
	</div>

	<div class="contentcontainer_top">
	</div>
	<div id="productDetail_container">
	    <div class="bnCategory"><img src="<?php echo base_url();?>images/category/news.jpg" width="734" height="94"; ></div>
		<div class="listContainer">
		    <div class="listLine">
			</div>
			<div class="listTitle_s">
			id
			</div>
			<div class="contentTitle_b">
			<?= $techList->id;?>
			</div>
			<div class="dottedLine">
			</div>

			<div class="listTitle_s">
			name
			</div>
			<div class="contentFile">
			<?= $techList->name;?>
			</div>
			<div class="dottedLine">
			</div>

			<div class="listTitle_s">
			file1
			</div>
			<div class="contentFile">
			<a href="<?= $techList->file1;?>"><?= $techList->file1;?></a>
			</div>
			<div class="dottedLine">
			</div>
            <div class="listTitle_s">
			file2
			</div>
			<div class="contentFile">
			<a href="<?= $techList->file2;?>"><?= $techList->file2;?><a>
			</div>
			<div class="dottedLine">
			</div>

			<div style="width:620px; height:300px; border:1px #ccc solid; text-align:left; clear:both; padding:20px;">
			<?= $techList->description;?>
			</div>
			<!-- List Contents end -->

			<div class="listLine">
			</div>

			<div class="button"><a href="/support/tech">back to list</a></div>

		</div>
	</div>
	<div class="contentcontainer_bottom">
	</div>

</div>