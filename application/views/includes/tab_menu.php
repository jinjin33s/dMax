<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<div id="WrapperTab">
	<div id="NavigationTab">
		<ul id="primaryTab">
			<li><a href="#" class="active">TAB 1</a></li>
			<li><a href="#">TAB 2</a></li>
			<li><a href="#">TAB 3</a></li>
		</ul>
	</div>
	<div id="ContainerTab">
		<div id="ContentTab">
			<div id="TAB1" style="">		
				 <h1>Tab One</h1>
				 <p>
					This is tab one. You can put specific information for tab one here.
				</p>
			</div>
			<div id="TAB2" style="display: none;">		
				 <h1>Tab Two</h1>
				<p>
					This is tab two. You can put specific information for tab one here.
				</p>
			</div>
			<div id="TAB3" style="display: none;">		
				<h1>Tab Three</h1>
				<p>
					This is tab three. You can put specific information for tab one here.
				</p>
			</div>
		</div>
	</div>
</div> 
	
<script>

	$("#primaryTab a").click(function(){
			$("#primaryTab a").removeClass("active");
			$(this).addClass("active");
			$("#ContentTab div").css("display", "none");
			var tabname = $(this).text();
			tabname = tabname.replace(' ','');
			$("#"+tabname).css("display","block");
	 });

</script>

