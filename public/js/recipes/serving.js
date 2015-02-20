
$("input[name=serving_nr_input]").bind('keyup change click', function (e) {
    if (! $(this).data("previousValue") || 
           $(this).data("previousValue") != $(this).val()
       )
   {
        var serving = parseInt($('#serving_nr')[0].innerHTML);
		var input = parseInt($('#serving_nr_input')[0].value);

		$('.ingredient_nr').each(function (serving, input) {
			var value = parseInt($(this).innerHTML);
			$(this).text(value / serving * input);
		})
		
        console.log("changed");           
        $(this).data("previousValue", $(this).val());
   }
        
});


$("input[name=serving_nr_input]").each(function () {
    $(this).data("previousValue", $(this).val());
});