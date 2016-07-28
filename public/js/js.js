
var pubhead = new TimelineMax({repeat:-1, repeatDelay:2});	

pubhead.set("#head11", {visibility:"visible"})
.from("#head11", 0.8, {top:10, autoAlpha:0, ease:Bounce.easeOut })
.set("#head22", {visibility:"visible"})	
.from("#head22", 0.8, {left:245, autoAlpha:0, ease:Bounce.easeOut })
.set("#head33", {visibility:"visible"})	
.from("#head33", 0.8, {top:57, autoAlpha:0})
.set("#head11", {visibility:"hidden", delay:5})
.set("#head22", {visibility:"hidden"})
.set("#head33", {visibility:"hidden"});






var _b1 = $("#produit-b");
    _b1.mouseenter(function(){
	 var td2 = new TimelineMax;
	td2.set("#produit-m", {visibility:"visible"})
		.from("#produit-m", 0.5, {top:80, ease:Bounce.easeOut }) ;
  
		})
		
		_b1.mouseleave(function() {
	 var td2 = new TimelineMax;
	td2.set("#produit-m", {visibility:"hidden"})

		});
			

var _b2 = $(".bouton1");
    _b2.mouseenter(function(){
	 var td2 = new TimelineMax;
	td2.set("#list1", {visibility:"visible"})
		})
		
		_b2.mouseleave(function() {
	 var td2 = new TimelineMax;
	td2.set("#list1", {visibility:"hidden"})

		});
		
		
var _b3 = $(".bouton2");
    _b3.mouseenter(function(){
	 var td2 = new TimelineMax;
	td2.set("#list2", {visibility:"visible"})

  
		})
		
		_b3.mouseleave(function() {
	 var td2 = new TimelineMax;
	td2.set("#list2", {visibility:"hidden"})
   
		});		
	
var _b4 = $(".bouton3");
    _b4.mouseenter(function(){
	 var td2 = new TimelineMax;
	td2.set("#list3", {visibility:"visible"})
		
  
		})
		
		_b4.mouseleave(function() {
	 var td2 = new TimelineMax;
	td2.set("#list3", {visibility:"hidden"})
   
		});	
			
var _b5 = $(".bouton4");
    _b5.mouseenter(function(){
	 var td2 = new TimelineMax;
	td2.set("#list4", {visibility:"visible"})
		
  
		})
		
		_b5.mouseleave(function() {
	 var td2 = new TimelineMax;
	td2.set("#list4", {visibility:"hidden"})
   
		})	
	
						
var _b6 = $(".bouton5");
    _b6.mouseenter(function(){
	 var td2 = new TimelineMax;
	td2.set("#list5", {visibility:"visible"})
		
  
		})
		
		_b6.mouseleave(function() {
	 var td2 = new TimelineMax;
	td2.set("#list5", {visibility:"hidden"})
   
		});	
			
var _b7 = $(".bouton6");
    _b7.mouseenter(function(){
	 var td2 = new TimelineMax;
	td2.set("#list6", {visibility:"visible"})
		
  
		})
		
		_b7.mouseleave(function() {
	 var td2 = new TimelineMax;
	td2.set("#list6", {visibility:"hidden"})
   
		});	
		
				
	var td5 = new TimelineMax({repeat:-1, yoyo:true});	
	td5.to("#logo", 1, { top:-5});	
	

var $in = $("#bouton1");
var $out = $("#bouton2");
var tb = new TimelineLite();

$in.on("click", function() {
	
		tb.to("#face", 1, {
			right: "-329px"
		});
		tb.set("#bouton2", {visibility:"visible"})
		});
$out.on("click", function() {
	
		tb.to("#face", 1, {
			right: "-10px"
		});
		tb.set("#bouton2", {visibility:"hidden"})
		});		
		
		
var $in = $("#ouvert");
var $out = $("#ferme");
var tb7 = new TimelineLite();

$in.on("click", function() {
		tb7.set("#legal", {visibility:"visible"})
		.from("#legal", 1.1, {autoAlpha:0 });
		});
$out.on("click", function() {
		tb7.set("#legal", {visibility:"hidden"});
		});


$( window ).scroll(function() {
	var scrollX=$(document).scrollTop();
	if (scrollX>120){
		$('div#jump').css({"position":"fixed","top":0,"z-index":3000});
	}else{
		$("div#jump").css({"position":"relative"});
	}
});