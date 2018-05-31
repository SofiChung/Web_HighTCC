var chart = document.getElementById("Nwagon2");
var foreground = chart.getElementsByClassName("foreground");
var polygon1 = foreground[0].getElementsByTagName("polyline"); 
var circle1 = foreground[0].getElementsByTagName("circle");

for(var i=0; i < circle1.length; i++){
	 $(circle1[i]).attr("fill","#004DDB");
}

$(polygon1).attr("fill","#004DDB");
$(polygon1).attr("stroke","#004DDB");



var polygon2 = foreground[1].getElementsByTagName("polyline"); 
var circle2 = foreground[1].getElementsByTagName("circle");

for(var i=0; i < circle1.length; i++){
	 $(circle2[i]).attr("fill","#A5A5A5");
}

$(polygon2).attr("fill","#A5A5A5");
$(polygon2).attr("stroke","#A5A5A5");