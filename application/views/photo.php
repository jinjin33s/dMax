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
		<div class="bnCategory"><img src="<?php echo base_url();?>images/category/news.jpg" width="734" height="94" ></div>
		<div class="listContainer">
                        <div class="listNo">
			no
			</div>			
			<div class="listDate">
			date
			</div>
                        <div class="listImage">
			Image
			</div>
			<div class="listTitlephoto">
			Title
			</div>
			<div class="listLine">
			</div>
            <!-- List Contents start -->
                <?php if(!$photoList){ ?>
                <?php }else{ ?>   
                
                    <?php $num=1;
                        
                        foreach($photoList as $pl) {?>
                        
                        <div class="contentNo">
			<?= $num ?>
			</div>

			<div class="contentDate">
                        <?= $pl->photodate?>
			</div>

                        <div class="contentImage">
			<a href="<?=base_url()."newsEvent/photodetail/".$pl->id;?>"> <img src="<?= $pl->image?>" width="70" height="50"></a><br>
			</div>

			<div class="contentTitlephoto">
			<a href="<?=base_url()."newsEvent/photodetail/".$pl->id;?>"><?= $pl->title?></a><br>
			</div>

                        <div class="dottedLine">
			</div>

                    <?php $num = $num + 1;}?>
			
			<!-- List Contents end -->

			<div class="listLine">
			</div>

                <? if(isset($pagination)) {?>
                <div class="pagination">
                <? echo $pagination;?>
                </div>
                <?}?>
                <?}?>
                        
		</div>
	</div>
	<div class="contentcontainer_bottom">		
	</div>

</div>