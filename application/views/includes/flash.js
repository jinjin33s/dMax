function flash(id, width, height){
document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+width+'" height="'+height+'" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" id=ShockwaveFlash1>'
+'<param name="movie" value="'+id+'">'
+'<param name="quality" value="high">'
+'<param name="wmode" value="transparent">'
+'<param name="z-index" value="1">'
+'<embed src="'+id+'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" width="'+width+'" height="'+height+'"type="application/x-shockwave-flash"></embed>'
+'</object>');
}
