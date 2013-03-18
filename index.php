<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Coin Test</title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.2.custom.min.css">

	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
</head>
<body>
	<div class="container">
		
		<button type="button" class="btn-pesar">Pesar</button>
		<button type="button" class="btn-resposta">Resposta</button>
		<h3></h3>


		<div id="box" class="box fleft droppable">
			<div id="ball1" class="circle draggable" data-weight="0"></div>
			<div id="ball2" class="circle draggable" data-weight="0"></div>
			<div id="ball3" class="circle draggable" data-weight="0"></div>
			<div id="ball4" class="circle draggable" data-weight="0"></div>
			<div id="ball5" class="circle draggable" data-weight="0"></div>
			<div id="ball6" class="circle draggable" data-weight="0"></div>
			<div id="ball7" class="circle draggable" data-weight="0"></div>
			<div id="ball8" class="circle draggable" data-weight="0"></div>
			<div id="ball9" class="circle draggable" data-weight="0"></div>
			<div id="ball10" class="circle draggable" data-weight="0"></div>
			<div id="ball11" class="circle draggable" data-weight="0"></div>
			<div id="ball12" class="circle draggable" data-weight="0"></div>
		</div>

		<div class="balanca">
			<div id="prato1" class="prato1 fleft droppable">

			</div>

			<div id="prato2" class="prato2 fleft droppable">
				
			</div>
		</div>
		
		<div id="disposal" class="disposal droppable fright">
			
		</div>
		
		<h2>RESPOSTA</h2>
		<div id="resposta" class="droppable">
			
		</div>
		
		

		<div class="footer"></div>
	</div>


	<script>


		// $(function () {
		// 	$(".draggable").draggable({
		// 	   //revert: true,
		// 	   opacity: .75,
		// 	   //containment: '.container',
		// 	   cursor: 'move',
		// 	   //cursorAt: { top: 35, left: 45 },
		// 	   helper: function(event) {
		// 	   return $(this);
		// 	   },
		// 	});
		// });

		$(function () {
			var cont 	= 1;
			var random 	= (Math.random()*12 | 0)+1;
			var random2 = (Math.random()*100000000|0)+1;
			var falseBall;
			
			if(random2%2==0)
				falseBall = 2;
			else
				falseBall = 0.5;

			$('.box').children().each(function(){
				if(cont==random)
					$(this).data('weight', falseBall);
				else
					$(this).data('weight', 1);

				cont++;
			});

			$('.box').children().each(function(){
				console.log($(this).data('weight'));
			});

			$('.draggable').draggable({
					zIndex: 10000,
				});

			$('.droppable').droppable({drop: Drop});

			function Drop(event, ui){
				var draggableId = ui.draggable.attr("id");
				var droppableId = $(this).attr("id");
				//console.log(droppableId);
				$("#"+droppableId).append($("#"+draggableId));
				$("#"+draggableId).animate({
					left: 0,
					top: 0
				});
			}

			$('.btn-pesar').on('click', function(){
				var plate1 = 0;
				var plate2 = 0;

				$('#prato1').children().each(function(){
					plate1 += $(this).data('weight');
				});
				$('#prato2').children().each(function(){
					plate2 += $(this).data('weight');
				});

				if(plate1>plate2){
					$('h3').html('PRATO 1 PESA MAIS');
					$('#prato1').css('background', '#C74223');
					$('#prato2').css('background', '#5E7D4D');
				}
					
				if(plate2>plate1){
					$('h3').html('PRATO 2 PESA MAIS');
					$('#prato2').css('background', '#C74223');
					$('#prato1').css('background', '#5E7D4D');
				}
					
				if(plate1===plate2){
					$('h3').html('OS PRATOS ESTÃO COM PESOS IGUAIS');
					$('#prato1').css('background', '#5E7D4D');
					$('#prato2').css('background', '#5E7D4D');
				}
					

				console.log("Prato 1: " + plate1);
				console.log("Prato 2: " + plate2);
			});

			$('.btn-resposta').on('click', function(){
				var peso = $('#resposta').children('.circle').data('weight');
				if(peso != 1){
					alert('Resposta correta! :D\n' + "A moeda da resposta tem peso " + peso);
				}
				else{
					alert('Resposta incorreta. :(');
				}
			});
		});
	</script>

</body>
</html>