<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_support.php'); ?>
</div>
<div class="rightcontainer">
	<div class="breadcrumb">home &raquo; Support &raquo; Technical Support
	</div>
	<div class="titleCategory">Technical Support
	</div>
	
	<div class="contentcontainer_top">		
	</div>
	<div id="productDetail_container">
            <div class="bnCategory"><img src="<?php echo base_url();?>images/category/support.jpg" width="734" height="94"></div>
		<div class="listContainer" style="width:660px; height:500px; border:0px solid #ccc; margin-left:auto; margin-right:auto; padding-top:50px; padding-left:20px; padding-right:20px;">
                        <div class="listNo" >
			no
			</div>			
			<div class="listTitle" >
			title
			</div>
			<div class="listDate" >
			files
			</div>
			<div style="height:0px; width:650px; border:#ddd solid 2px; float:left; clear:both; margin-bottom:10px; margin-top:5px;">
			</div>
            <!-- List Contents start -->
                <?php if(!$techList){?>
                    <div class="listTitle" >
			There is no support request.
                    </div>
                <?php }else{ ?>
                    <?php foreach($techList as $tl){?>
                        <div class="contentNo" style="width:30px; float:left; text-transform:uppercase;  color:#777; font-size:12px; text-align:center;">
			<?= $tl->id;?>
			</div>			
			<div class="contentTitle" style="width:480px; float:left; font-weight:bold; color:#000; font-size:12px; text-align:left; padding-left:20px;">
			<a href="<?= base_url()."support/detail/".$tl->id;?>"><?= $tl->name;?></a>
			</div>
			<div class="listDate" style="width:40px; float:left; text-transform:uppercase; color:#005cff; font-size:10px; text-align:center;">
                            <?php if (!$tl->file1){ ?>
                            <div>-</div>
                            <?php }else{ ?>                            
                            <a href="<?= $tl->file1;?>" target="_blank">view</a>
                            <?php } ?>
			</div>
			<div class="listDate" style="width:80px; float:left; text-transform:uppercase; color:#005cff; font-size:10px; text-align:center;">
                            <?php if (!$tl->file2){ ?>
                            <div>-</div>
                            <?php }else{ ?>
                            <a href="<?= $tl->file2;?>" target="_blank">download</a>
                            <?php } ?>
			</div>
			<div style="height:0px; width:650px; border-bottom:#ccc dotted 1px; float:left; clear:both; margin-bottom:7px; margin-top:7px;">
			</div>
                    <?php }?>
                    <?php }?>
			<!-- List Contents end -->

			<div style="height:0px; width:650px; border:#ddd solid 2px; float:left; clear:both; margin-bottom:10px; margin-top:5px;">
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