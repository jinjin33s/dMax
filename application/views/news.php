<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_news.php'); ?>
</div>
<div class="rightcontainer">
	<div class="breadcrumb">home &raquo; News & Events &raquo; News & Events
	</div>
	<div class="titleCategory">News & Events
	</div>
	
	<div class="contentcontainer_top">		
	</div>
	<div id="productDetail_container">
	    <div class="bnCategory"><img src="<?php echo base_url();?>images/category/news.jpg" border="0"></div>
		<div class="listContainer">			
                        <div class="listNo">
			no
			</div>
			<div class="listDate">
			date
			</div>
			<div class="listTitle">
			title
			</div>	
			<div class="listLine">
			</div>
            <!-- List Contents start -->
                <?php if(!$newsList){ ?>
                <?php }else{ ?>            
                <?php 
                        foreach($newsList as $nl){ ?>
                        
                        <div class="contentNo">
                        <?= $nl->id?>
                        </div>

			<div class="contentDate">
			<?= $nl->newsdate ?>
			</div>
			
                        <div class="contentTitle">
			<a href="<?=base_url()."newsEvent/detail/".$nl->id;?>"><?= $nl->title ?></a>
			</div>

			<div class="dottedLine">
			</div>
                <?php } ?>
                <?php } ?>


			<div class="listLine">
			</div>
                    <? if(isset($pagination)) {?>
                    <div class="pagination">
                    <? echo $pagination;?>
                    </div>
                    <?}?>
		</div>            
	</div>
    
	<div class="contentcontainer_bottom">		
	</div>

</div>