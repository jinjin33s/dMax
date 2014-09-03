<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_product.php'); ?>
</div>
<div class="rightcontainer">
    <?php if(!$selectedCategory) {?>
        <div class="titleCategory">No Products in this category
	</div>
    <?php }else{?>
	<div class="breadcrumb">home &raquo; product &raquo; <?php echo $selectedCategory->name; ?>
	</div>
	<div class="titleCategory"><?php echo $selectedCategory->name; ?>
	</div>
	<div><img src="<?php echo base_url();?><?php echo $selectedCategory->banner; ?>" border="0">
	</div>
	<div class="discCategory"><?php echo $selectedCategory->description; ?></div>
	<div class="productcontainer">

            <table width="760" border="0" cellpadding="0" cellspacing="0">                
                <?php for($i = 0; $i < ($selectedCategory->s_categories->count()); $i++) {?>     
                        <td width="190" align="center" valign="top" cellpadding="5">
                            <table width="156" height="141" background="<?php echo base_url();?>images/product_bg.png">
                                <td align="center">
                                    <a href="<?= base_url() ?> products/subCategory/<?php echo $selectedCategory->id;?>/<?php echo $selectedCategory->s_categories[$i]->id;?>"><img src="<?php echo $selectedCategory->s_categories[$i]->image;?>" border="0" width="110" height="110"></a>
                                </td>
                            </table>
                            <div class="titleCategory_small"><?php echo $selectedCategory->s_categories[$i]->name; ?></div>
                        </td>                    
                    <?php if(($i+4)%4 == 3) {?><tr><?php } ?>
                    <?php } ?>  
             </table>   
            <?php } ?>
	</div>               
</div>