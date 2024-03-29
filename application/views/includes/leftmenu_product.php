<script type="text/javascript">
//<![CDATA[
window.onload = function() {
	rolinTab("rolin")
}

function rolinTab(obj) {

	var list =  __$(obj).getElementsByTagName("LI");
	//var list = $("LI");
	var state = {show:false,
					     hidden:false,
						 showObj:false};

	
	for (var i=0; i<list.length; i++) {
		var tmp = new rolinItem(list[i],state);
	
		if ($(".selected").get(0)   == list[i]) 
	   { 
			
				tmp.pShow(); 
		}

	}
}


function rolinItem(obj,state) {

		var speed = 0.1;
		var range = 1;
		var interval;
		var tarH;
		var tar = this;
		var head = getFirstChild(obj);
		var content = getNextChild(head);
		var isOpen = false;
		
		this.pHidden = function() {
				if (isOpen) hidden();
		}
		
		this.pShow = show;
		var baseH = content.offsetHeight;
		content.style.display = "none";
		var isOpen = false;
		
		head.onmouseover = function() {
				this.style.background = "#4f4e96";
		}

		head.onmouseout = mouseout;
		head.onclick = function() {
				this.style.background = "#030268";

				if (!state.show && !state.hidden) {
						if (!isOpen) {
								head.onmouseout = null;
								show();
						} else {
								hidden();
						}
				}
		}

	function mouseout() {
		this.style.background = "#030268"
	}

	function show() {
			head.style.borderBottom = "1px solid #DADADA";
			state.show = true;
			if (state.openObj && state.openObj != tar ) {
					state.openObj.pHidden();
			}
			content.style.height = "0px";
			content.style.display = "block";
			content.style.overflow = "hidden";
			state.openObj = tar;
			tarH = baseH;
			interval = setInterval(move,10);
	}

	function showS() {
			isOpen = true;
			state.show = false;
	}

	function hidden() {
		state.hidden = true;
		tarH = 0;
		interval = setInterval(move,10);
	}

	function hiddenS() {
		head.style.borderBottom = "none";
		head.onmouseout = mouseout;
		head.onmouseout();
		content.style.display = "none";
		isOpen = false;
		state.hidden = false;
	}

	function move() {
		var dist = (tarH - content.style.height.pxToNum())*speed;
		if (Math.abs(dist) < 1) dist = dist > 0 ? 1: -1;
		content.style.height = (content.style.height.pxToNum() + dist) + "px";
		if (Math.abs(content.style.height.pxToNum() - tarH) <= range ) {
				clearInterval(interval);
				content.style.height = tarH + "px";
				
				if (tarH != 0) {
					showS()
				} else {
					hiddenS();
				}
		}
	}
}

var __$ = function($) {
		return document.getElementById($)
};

String.prototype.pxToNum = function() {
		return Number(this.replace("px",""))
}

function getFirstChild(obj) {
	var result = obj.firstChild;
	while (!result.tagName) {
		result = result.nextSibling;
	}
	return result;
}

function getNextChild(obj) {
		var result = obj.nextSibling;
		while (!result.tagName) {
				result = result.nextSibling;
		}
		return result;
}
//]]>
</script>
<?php
    $categoryList = Doctrine::getTable('Category')->findAll();
?>
<div class="titleCategory_left">Products
</div>
<ul class="rolinList" id="rolin">
	<?php foreach($categoryList as $cl){
			if( $cl->id == $main_category_id)
			{
				$className = "leftNav selected";
			}
			else
	       {
			  $className = "leftNav";
		   } 
  ?>
            <li class="<?php echo $className?>">
                <div class="leftNavtitle"><?php echo $cl->name; ?></div>
                    <div class="content"><p>
                            <?php foreach($cl->s_categories as $subCategory) {?>
                                <a href="<?php echo base_url()?>products/subCategory/<?= $cl->id?>/<?php echo $subCategory->id;?>" style="line-height:1.5;"><?php echo $subCategory->name ?></a><br>
                            <?php }?>
                    </p></div>
            </li>
         <?php } ?>        
</ul>

<?php $this->load->view('includes/left_banner.php'); ?>