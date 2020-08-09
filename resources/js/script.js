
$(function () {
	/** -----------------------------------------
	 * Modulo del Slider 
	 -------------------------------------------*/
	var SliderModule = (function () {
		var pb = {};
		pb.el = $('#slider');
		pb.items = {
			panels: pb.el.find('.slider-wrapper > li'),
		}

		// Interval del Slider
		var SliderInterval,
			currentSlider = 0,
			nextSlider = 1,
			lengthSlider = pb.items.panels.length;

		// Constructor del Slider
		pb.init = function (settings) {
			this.settings = settings || { duration: 8000 };
			var items = this.items,
				lengthPanels = items.panels.length,
				output = '';

			// Insertamos nuestros botones
			for (var i = 0; i < lengthPanels; i++) {
				if (i == 0) {
					output += '<li class="active"></li>';
				} else {
					output += '<li></li>';
				}
			}

			$('#control-buttons').html(output);

			// Activamos nuestro Slider
			activateSlider();
			// Eventos para los controles
			$('#control-buttons').on('click', 'li', function (e) {
				var $this = $(this);
				if (!(currentSlider === $this.index())) {
					changePanel($this.index());
				}
			});

		}

		// Funcion para activar el Slider
		var activateSlider = function () {
			SliderInterval = setInterval(pb.startSlider, pb.settings.duration);
		}

		// Funcion para la Animacion
		pb.startSlider = function () {
			var items = pb.items,
				controls = $('#control-buttons li');
			// Comprobamos si es el ultimo panel para reiniciar el conteo
			if (nextSlider >= lengthSlider) {
				nextSlider = 0;
				currentSlider = lengthSlider - 1;
			}

			controls.removeClass('active').eq(nextSlider).addClass('active');
			items.panels.eq(currentSlider).fadeOut('slow');
			items.panels.eq(nextSlider).fadeIn('slow');

			// Actualizamos los datos del slider
			currentSlider = nextSlider;
			nextSlider += 1;
		}

		// Funcion para Cambiar de Panel con Los Controles
		var changePanel = function (id) {
			clearInterval(SliderInterval);
			var items = pb.items,
				controls = $('#control-buttons li');
			// Comprobamos si el ID esta disponible entre los paneles
			if (id >= lengthSlider) {
				id = 0;
			} else if (id < 0) {
				id = lengthSlider - 1;
			}

			controls.removeClass('active').eq(id).addClass('active');
			items.panels.eq(currentSlider).fadeOut('slow');
			items.panels.eq(id).fadeIn('slow');

			// Volvemos a actualizar los datos del slider
			currentSlider = id;
			nextSlider = id + 1;
			// Reactivamos nuestro slider
			activateSlider();
		}

		return pb;
	}());

	SliderModule.init({ duration: 4000 });

});








$(document).ready(function () {
	var zindex = 10;

	$("div.Card").click(function (e) {
		//   e.preventDefault();

		var isShowing = false;

		if ($(this).hasClass("show")) {
			isShowing = true
		}

		if ($("div.cards").hasClass("showing")) {
			// a card is already in view
			$("div.Card.show")
				.removeClass("show");

			if (isShowing) {
				// this card was showing - reset the grid
				$("div.cards")
					.removeClass("showing");
			} else {
				// this card isn't showing - get in with it
				$(this)
					.css({ zIndex: zindex })
					.addClass("show");

			}

			zindex++;

		} else {
			// no cards in view
			$("div.cards")
				.addClass("showing");
			$(this)
				.css({ zIndex: zindex })
				.addClass("show");

			zindex++;
		}

	});
});


//logo presto che routa

let logo = document.querySelector("#logo")

document.addEventListener('scroll', () => {
	logo.style.transform = "rotateZ(" + window.scrollY / 6 + "deg)"

	if (window.scrollY > 250) {
		navbar.classList.add("navbarDesktop")
	}

	else {
		navbar.classList.remove("navbarDesktop")
	}
})

//lunghezza testo card

document.querySelectorAll('.bio').forEach(e =>{
    if (e.innerHTML.split(" ").length > 10) {

        let string = e.innerHTML.split(" ").slice(0,10);
        e.innerHTML = string.join(" ") + ' [...]';
    }
})

// $("#showText").click(function(){
// 	console.log('prova');	
//   });


//semafori revisore

let semaforo = document.querySelectorAll('.semaforo')

semaforo.forEach(e =>{
	console.log(e.innerHTML);
	if(e.innerHTML == "VERY_UNLIKELY" || e.innerHTML == "UNLIKELY"){
		e.innerHTML="<i class='fas fa-circle' style='color:green'></i>"
	}
	else if	(e.innerHTML == "POSSIBLE"){
		e.innerHTML="<i class='fas fa-circle' style='color:yellow'></i>"
	}

	else if(e.innerHTML == "VERY_LIKELY" || e.innerHTML == "LIKELY"){
		e.innerHTML="<i class='fas fa-circle' style='color:red'></i>"
	}
})


