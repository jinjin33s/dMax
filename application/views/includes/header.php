<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php if (isset($product)) { ?>
<title><?php echo $product->title;?></title>
<meta name="Keywords" content="<?php echo $product->tag;?>"></meta>
<?php }else{ ?>
<title>DmaxSecurity - Lead the Future of Digital CCTV industry</title>
<?php } ?>

<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/nav.css" rel="stylesheet" type="text/css" />

<!-- ### JAVA SCRIPT ### -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/flash.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
    function minimizeTopMenu()
    {
         $("#topMenu").height(40);
    }

    function maximizeTopMenu()
    {
        $("#topMenu").height(250);
    }

    window.onresize = function() {
            //setMainContentHeight();
    }

    function setMainContentHeight(){
            
           // $('#contentscontainer').height('auto');
            
           
            var docHeight = $(document).height() - $('#headercontainer').height() - $('#footercontainer').height() + 20;
			//docHeight = 600;
            var mainContentHeight = $('#contentscontainer').height();
            var rightContentHeight = $('#rightcontentscontainer').height();
            
            var maxHeight = Math.max(mainContentHeight,rightContentHeight);
            maxHeight =  Math.max(maxHeight, docHeight);
           //alert(maxHeight);
            //$('#contentscontainer').height(maxHeight);
           
            
     }
    $(document).ready(function(){
            
            //setMainContentHeight();
     });

     $(document).ready(function () {
		
		$('#topNav li').hover(
            function () {
                //show its submenu
                $('ul', this).slideDown(100);

            },
            function () {
               //hide its submenu
               $('ul', this).slideUp(100);
           }
       );

   });
</script>

<SCRIPT LANGUAGE="JavaScript">
function popup_img( ) { // ??_1 
         var myWin = window.open('product_img.php','pbml_win','toolbar=no,location=no,directories=no, status=no,menubar=no,resizable=no,scrollbars=1,width=600,height=600,top=100,left=100'); 
      }
</SCRIPT>
<?php
    $categoryList = Doctrine::getTable('Category')->findAll();
?>
</head>

<body>
<div id="headercontainer">
	<div id="topLogoContainer">
		<div style="float:left;">
		<a style="float:left;position:relative;margin-left:15px;top:8px; margin-right:10px;" href="<?php echo base_url();?>">
			<img border="0" src="<?php echo base_url();?>/images/logo.png" />
		</a>
		</div>

		<div id="topMenuContainer">
			<ul id="topNav">

                                <li class="product"><a href="<?php echo base_url();?>products/category/1"></a>
                                    <ul>
                                        <?php foreach($categoryList as $cl){?>
                                            <li class="tm1"><a href="<?php echo base_url()?>products/category/<?php echo $cl->id;?>"><?php echo $cl->name ?></a></li>
                                        <?php }?>
										<li class="navBottom"></li>
                                    </ul>
				</li>
				

				<li class="support"><a href="<?php echo base_url();?>support/download"></a>
					<ul>
						 <li class="tm11"><a href="<?php echo base_url();?>support/download">Download</a></li>
						 <li class="tm12"><a href="<?php echo base_url();?>support/tech">Tech Support</a></li>
						 <li class="tm13"><a href="<?php echo base_url();?>support/faq">F.A.Q</a></li>
						 <li class="navBottom"></li>
					</ul>
				</li>

				<li class="aboutus"><a href="<?php echo base_url();?>about"></a>
					<ul>
						 <li class="tm21"><a href="<?php echo base_url();?>about/about">About us</a></li>
						 <li class="tm22"><a href="<?php echo base_url();?>about/certification">Certification</a></li>
						 <li class="navBottom"></li>
					</ul>
				</li>

				<li class="newsevent"><a href="<?php echo base_url();?>newsEvent/news"></a>
					<ul>
						 <li class="tm31"><a href="<?php echo base_url();?>newsEvent/news">News & Events</a></li>
						 <li class="tm32"><a href="<?php echo base_url();?>newsEvent/photo">Photo Gallery</a></li>
						 <li class="navBottom"></li>
					</ul>
				</li>

				<li class="contactus"><a href="<?php echo base_url();?>contact"></a>
				</li>		       
			</ul>

		</div>
		
		<div id="searchcontainer">
			<form id='searchForm' method='post' action='<?php echo base_url() . "products/search"; ?>' >
				<div id="searchbox">
					<div style="float:left;">
					<input name="searchStr" type="text" autocomplete="off" style="height:20px; width:123px; border:0px; background-color:#fff; color:#555;"/>
					</div>
					<div style="float:left;">
					<input id="searchbtn" type="image" src="<?php echo base_url();?>/images/buttons/btn_Magnifyglass.png" style="margin-top:6px; margin-left:5px;"/>
					</div>
				</div>							
			</form>
		</div>


	</div>
	
  
		
</div>

