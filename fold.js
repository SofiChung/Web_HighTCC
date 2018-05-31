$(document).ready(function(){
			$("#spreadBtn").click(function(){
				if($(".s1").is(":visible")){ 
					var b = document.getElementById("spreadBtn"); 
					b.innerHTML = "펼치기";
					$(".s1").slideUp();
				}else{
					var b = document.getElementById("spreadBtn"); 
					b.innerHTML = "접기";
					$(".s1").slideDown();
					
					}
				}); 
			}); 