$(function(){
	$(".dropdown-menu li a").on("click", function () {
		var $this = $(this);
		$("#input-group-btn").html($this.html()+" <span class=\"caret\"></span>");
		$("#input-group-btn").attr("value",$this.attr("value"));
		$("#searchType").attr("name","WFSolutions["+$this.attr("value")+"]");
		});
});