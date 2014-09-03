<?php
    $categoryList = Doctrine::getTable('Category')->findAll();
?>

<script>flash('<?php echo base_url();?>images/main_banner.swf','961','420');</script>
<div id="bannercontainer">
	<ul id="mainBanner">
            <?php foreach($categoryList as $cl){?>
                <li class="categoryTab"><a href="<?php echo base_url();?>products/category/<?php echo $cl->id;?>"><?php echo $cl->name ?></a></li>
		<li style="width:2px;"></li>
            <?php } ?>
	</ul>
</div>
<div id="bottomcontainer">
	<div id="newproduct_container">
		<?php
                foreach($banner as $bannerlist){
        ?>
                
		<div id="maintitle_small">
			 <a href="<?php echo $bannerlist->npLink;?>">New Product</a>
		</div>
		<div id="newproduct">
			<img src="<?php echo base_url();?><?php echo $bannerlist->npImg;?>" border="0" width="300">
		</div>
		<a href="<?php echo $bannerlist->npLink;?>"><div class="btnMore"></div></a>
	</div>

	<div id="featuredproduct_container">                
		<div id="maintitle_small">
			 <a href="<?php echo base_url();?>products/">Featured Product</a>
		</div>
		<div id="featuredproduct">
		<img src="<?php echo base_url();?><?php echo $bannerlist->fpImg;?>" border="0" width="300">
		</div>
		<a href="<?php echo $bannerlist->fpLink;?>"><div class="btnMore"></div></a>
	</div>
              <?php  } ?>
	<div id="news_container">
		<div id="newsTableTop">
		</div>
		<div id="news_content">
			<div id="maintitle_big">News & Events
			</div>
			<div id="news_text">
				<?php
				foreach($news as $newslist){
				?>
				<?php echo $newslist->newsdate;?>     <a href="<?php echo base_url();?>/newsEvent/detail/<?php echo $newslist->id;?>"><b><?php echo $newslist->title;?></b></a><br>
				<?php } ?>
			</div>
			<a href="<?php echo base_url();?>/newsEvent/"><div class="btnMoreNews"></div></a>
		</div>
		<div id="newsTableBottom">
		</div>

            <!--div id="bn_container">
			<div id="bn_technical"><a href=""><img src="<?php echo base_url();?>images/bn_tech.png" border="0"></a></div>
			<div id="bn_catalog"><a href=""><img src="<?php echo base_url();?>images/bn_catalog.png" border="0"></a></div>
			<div id="bn_contact"><a href=""><img src="<?php echo base_url();?>images/bn_contact.png" border="0"></a></div-->
        </div>
	</div>
</div>