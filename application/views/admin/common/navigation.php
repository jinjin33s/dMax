    <ul class="nav left" style="display: none;">

                <li><a class="top" href="/admin/dashboard">Dashboard</a></li>

                <li><a class="top">Product</a>
                        <ul>
                                <li><? echo anchor('admin/category_list', 'Category List'); ?></li>
                                <li><? echo anchor('admin/s_category_list', 'Sub Category List'); ?></li>
                                <li><? echo anchor('admin/product_list', 'Product List'); ?></li>
                        </ul>
                </li>

                <li><a class="top" href="/admin/support_list">Support</a>
                </li>

                <li><a class="top">News & Event</a>
                        <ul>
                                <li><? echo anchor('admin/news_list', 'News List'); ?></li>
                                <li><? echo anchor('admin/photo_list', 'Photo List'); ?></li>
                        </ul>
                </li>

                <li><a class="top" href="/admin/banner_list/edit">Main Banner</a>
                </li>
   
    </ul>
    


  <script type="text/javascript"><!--
    $(document).ready(function() {
        
        
	$('.nav').superfish({
		hoverClass	 : 'sfHover',
		pathClass	 : 'overideThisToUse',
		delay		 : 0,
		animation	 : {height: 'show'},
		speed		 : 'normal',
		autoArrows      : false,
		dropShadows     : false,
		disableHI	 : false, /* set to true to disable hoverIntent detection */
		onInit		 : function(){},
		onBeforeShow     : function(){},
		onShow		 : function(){},
		onHide		 : function(){}
	});
	$('.nav').css('display', 'block');
    });

//--></script>

  <script type="text/javascript"><!--
    function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');
		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}
	return urlVarValue;
    }

    $(document).ready(function() {

            route = getURLVar('route');
            if (!route) {
                    $('#dashboard').addClass('selected');
            } else {
                    part = route.split('/');
                    url = part[0];
                    if (part[1]) {
                            url += '/' + part[1];
                    }
                    $('a[href*=\'' + url + '\']').parents('li[id]').addClass('selected');
            }
    });

//--></script>
