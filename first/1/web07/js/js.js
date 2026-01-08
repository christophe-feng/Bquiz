// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	// jquery
	// $(x) 選取器
	$(x).fadeIn()
	// if(y){
	// 	$(y).fadeIn()
	// }
	if(y)
	$(y).fadeIn()
	
	if(y&&url)
	// .load → ajax用法
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}