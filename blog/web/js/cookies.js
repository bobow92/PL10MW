console.log('test');
console.log($);


$( ".accept" ).click(function() {
  $( ".cookies" ).hide();
  $(".flouting").css({ opacity: 1 });
});


$( ".refuse" ).click(function() {
  
	$(".flouting").css({ opacity: 1 });
	$( ".cookies" ).hide();
});

 

// var hasBeenClicked = false;
// jQuery('.flouting').click(function () {
//     hasBeenClicked = true;
// });

// if (hasBeenClicked) {
//         $(".flouting").css({ opacity: 1 });
// 	$( ".cookies" ).hide();
// } else {
//     /console.log('gg')
// }