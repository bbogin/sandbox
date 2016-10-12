// Select Plan Javascript

// jQuery(document).ready(function(){
//   $('.block').click(function() {
//   	if (!$(this).hasClass("info")) {
//       $(this).next('.info').slideToggle('slow');
//       return false;
//     }
//   });
// });


$(document).ready(function(){
	$( ".block-col" ).accordion({ active: false, collapsible: true });
	$(".comparethis").click(function () {
		$(this).parent().toggleClass("selected")
		$(this).parent().prev().toggleClass("selected")
		$(".block-col").accordion({active: false}).click();

	})


$('#close').click(function () {
    $("#accordion").accordion({active: false}).click();
});


















})
