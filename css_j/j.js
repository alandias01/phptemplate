$(document).ready(function() {
//-------------------jquery starts here----------------------------------
/*Here are some samples to get started

$("#object1, #object2").hide(); 
$("#object1").corner("tl 10px");

$("#object1").click(
       function () {
       event.preventDefault();
       $("#object1").hide();
       $("#object1").slideToggle();
});

$("#object1").hover( 
    function () {
    $(this).css({'background':'#AEAEFF', 'cursor': 'hand'});
     }, 
     function() { 
     $(this).css({'background':'#8B8CFE'});
     }
);

 $("#object1").media({ width: 600, height: 650});
 */

/*  This is from dragging, minimizing, and closing the window panels
$(".c-box").draggable({handle: 'div.c-t', grid:[20,20]});
$(".c-t_min").click(function(){$(this).parent().parent().parent().parent().next().slideToggle(100);  });
$(".c-t_close").click(function(){$(this).parent().parent().parent().parent().parent().hide();   });
*/

/* Rounding the corners of the window panels
 $("#roundcorner_1").next().corner("bl 60px"); 
 $("#roundcorner_2").corner("tr 40px");
*/


//For the sliding menu
$("#menu_top ul").css({display: "none"}); // Opera Fix
$("#menu_top li").hover(function(){
		$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown(200);
		},function(){
		$(this).find('ul:first').hide(100);
		});


//formatting form-update
$(".form-update table tr:odd").css({'background': 'lightgray'});
$(".form-update table tr td input[name='birthday']").datepicker({ dateFormat: 'yy-mm-dd' });






//-------------------jquery ends here----------------------------------
});


function lookup(inputword){

	if(inputword.length==0)
		{ $("#t1").hide(); }
	
	else
		{
		$("#t1").show ();
		$.post( "lib/ajax/ajaxlist.php", {q: inputword}, 
		function(data){ if(data.length >=0) { $("#t1").html(data); } } );
		}
}

