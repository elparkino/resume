$(function(){
	$.scrollIt();

	$(".list-group-item").hover(
		function(){
			$(this).addClass("active");
		},
		function(){
			$(this).removeClass("active");
	});

	$(".header-icon").hover(
		function(){
			$(this).popover('show');
		},
		function(){
			$(this).popover('hide');
	});


});

$("form.contact").on("submit", function(){
		var that = $(this),
			url  = that.attr("action"),
			type = that.attr("method"),
			data = {};

		that.find("[name]").each(function(index, value){
			var that  = $(this),
				name  = that.attr("name"),
				value = that.val();

			data[name] = value;
		});

		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response){
				console.log(response);
			}
		})
		return false;
	});

