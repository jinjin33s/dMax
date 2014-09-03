<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_product.php'); ?>
</div>
<?php if(!$subCategory) {?>
<div class="rightcontainer">
	<div class="titleCategory">No Data!
	</div>
	<div class="discCategory">input data at admin site</div>

	<div class="productcontainer">                
	</div>
</div>
<?php }else{?>
<div class="rightcontainer">
        <div class="breadcrumb">home &raquo; product &raquo; <?php echo $subCategory[0]->sub_category->category->name; ?> &raquo; <?php echo $subCategory[0]->sub_category->name; ?>
	<div class="titleCategory"><?php echo $subCategory[0]->sub_category->name; ?>
	</div>
	<div><img src="<?php echo base_url();?><?php echo $subCategory[0]->sub_category->category->banner; ?>" border="0">
	</div>
	<div class="discCategory"><?php echo $subCategory[0]->sub_category->description; ?></div>

	<div class="productcontainer">
            <? if(isset($pagination)) {?>
            <div class="pagination">
            <? echo $pagination;?>
            </div>
            <?}?>
                <table border="0" cellpadding="0" cellspacing="0">                    
                    <?php $i=0; foreach ($subCategory as $sc) { $i++;?>
                        <td width="250" align="left" valign="top" cellpadding="5">
                            <table width="156" height="141" background="<?php echo base_url();?>images/product_bg.png">
                                <tr>
                                    <td align="center">
                                        <a href="<?=base_url()."products/detail/".$sc->sub_category->category->id."/".$sc->id;?>"><img src="<?= $sc->image?>" border="0" width="110" height="110"></a>
                                    </td>
                                </tr>
                            </table>
                            <div class="titleProduct_small"><a href="<?=base_url()."products/detail/".$sc->sub_category->category->id."/".$sc->id;?>"><?= $sc->name?></a>
                            </div>
                            <div class="descProduct">
                                <?= $sc->features ?>
                            </div>
                        </td>  
                        <?php if(($i)%3 == 0) {?><tr><?php } ?>
                    <?php } ?>
                        
                </table>
            <? if(isset($pagination)) {?>
            <div class="pagination">
            <? echo $pagination;?>
            </div>
            <?}?>
	</div>
</div>
    
    <?php } ?>