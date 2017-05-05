function Slider(){
	$(".slider #1").show("fade", 300);
	$(".slider #1").delay(5500).hide("slide", {direction:'left'},300);
	
	/*sc= slider count*/
	var sc = $(".slider img").size();
	var count = 2; /*slide in the next id of 2*/
	
	setInterval (function(){
     $(".slider #"+count).show("slide",{direction:'right'},300);
	 $(".slider #"+count).delay(5500).hide("slide",{direction:'left'},300);
	 
	 if(count == sc){
		 count =1;
	 }else{
		 count = count+ 1;
	 }
    },6100);
}
