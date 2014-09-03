<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_product.php'); ?>
</div>
<div class="rightcontainer">
	<div class="breadcrumb">home &raquo; product &raquo; research &raquo; <?= $srchStr ?>
	</div>
	<div class="titleCategory">Search Result
	</div>
	<div style="margin-bottom:30px;"><img src="<?php echo base_url();?>images/category/vandalresistantdome.jpg" border="0">
	</div>
<?php
    if (!$product_list)
                {
                echo "Your search -".$srchStr."- did not match any product.";
                }else{ ?>
    <div class="productcontainer">
            <? if(isset($pagination)) {?>
            <div class="pagination">
            <? echo $pagination;?>
            </div>
            <?}?>
                <table width="750" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <?php foreach ($product_list as $box) { ?>

                            <td width="250" align="left" valign="top" cellpadding="5">
                                <table width="156" height="141" style="background:url(' <?php echo base_url();?>images/product_bg.png') no-repeat;">
                                    <tr>
                                        <td align="center">
                                            <a href="<?=base_url()."products/detail/".$box->sub_category->category->id."/".$box->id;?>"><img src="<?= $box->image?>" border="0" cellpadding="0" cellspacing="0" width="110" height="110" ></a>
                                        </td>
                                    </tr>
                                </table>
                                <div class="titleProduct_small"><?= $box->name?>
                                </div>
                                <div class="search_descProduct">
                                    <?= $box->features ?>
                                </div>
                            </td>
                            <? } }?>
                        </tr>                            
                </table>
                <? if(isset($pagination)) {?>
                <div class="pagination">
                <? echo $pagination;?>
                </div>
                <?}?>
	</div>
</div>