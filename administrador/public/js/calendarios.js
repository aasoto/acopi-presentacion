var ruta = $("#ruta").val();
var url_actual = window.location;

if ($("#eventos")) {

	if (document.getElementById("eventos")) {

		var eventos = JSON.parse($("#eventos").val());
		var total_eventos = $("#totalEventos").val();

		var filtro_eventos = "[{";
		var fecha_inicio, year_inicio, mes_inicio, dia_inicio, hora_completa_inicio, hora_inicio, minutos_inicio;
		var fecha_final, year_final, mes_final, dia_final, hora_completa_final, hora_final, minutos_final;
	

		for (var i = 0; i < total_eventos; i++) {
			if (i == (total_eventos-1)) {

				filtro_eventos = filtro_eventos+'"title":"'+eventos[i]["nombre"]+'",';
				if (eventos[i]["hora_inicio"] == null) {
					fecha_inicio = eventos[i]["fecha_inicio"];
					filtro_eventos = filtro_eventos + '"start":"'+fecha_inicio+'",';

				} else {
					fecha_inicio = eventos[i]["fecha_inicio"]+" "+eventos[i]["hora_inicio"];
					filtro_eventos = filtro_eventos + '"start":"'+fecha_inicio+'",';
				}
				if (eventos[i]["fecha_final"] != null) {
					if (eventos[i]["hora_final"] == null) {
						fecha_final = eventos[i]["fecha_final"];
						filtro_eventos = filtro_eventos + '"end":"'+fecha_final+'",';
					} else {
						fecha_final = eventos[i]["fecha_final"]+" "+eventos[i]["hora_final"];
						filtro_eventos = filtro_eventos + '"end":"'+fecha_final+'",';
					}
				}
				filtro_eventos = filtro_eventos + '"backgroundColor":"'+eventos[i]["backgroundColor"]+'","borderColor":"'+eventos[i]["borderColor"]+'"';
				if (eventos[i]["allDay"] == "true") {
					filtro_eventos = filtro_eventos + ',"allDay":true';
				} else {
					filtro_eventos = filtro_eventos + ',"allDay":false';
				}
				filtro_eventos = filtro_eventos + ',"url":"'+ruta+'/eventos/general/'+eventos[i]["id"]+'"}]';
			}else{
				filtro_eventos = filtro_eventos+'"title":"'+eventos[i]["nombre"]+'",';
				if (eventos[i]["hora_inicio"] == null) {
					fecha_inicio = eventos[i]["fecha_inicio"];
					filtro_eventos = filtro_eventos + '"start":"'+fecha_inicio+'",';

				} else {
					fecha_inicio = eventos[i]["fecha_inicio"]+" "+eventos[i]["hora_inicio"];
					filtro_eventos = filtro_eventos + '"start":"'+fecha_inicio+'",';
				}
				if (eventos[i]["fecha_final"] != null) {
					if (eventos[i]["hora_final"] == null) {
						fecha_final = eventos[i]["fecha_final"];
						filtro_eventos = filtro_eventos + '"end":"'+fecha_final+'",';
					} else {
						fecha_final = eventos[i]["fecha_final"]+" "+eventos[i]["hora_final"];
						filtro_eventos = filtro_eventos + '"end":"'+fecha_final+'",';
					}
				}
				filtro_eventos = filtro_eventos + '"backgroundColor":"'+eventos[i]["backgroundColor"]+'","borderColor":"'+eventos[i]["borderColor"]+'"';
				if (eventos[i]["allDay"] == "true") {
					filtro_eventos = filtro_eventos + ',"allDay":true';
				} else {
					filtro_eventos = filtro_eventos + ',"allDay":false';
				}
				filtro_eventos = filtro_eventos + ',"url":"'+ruta+'/eventos/general/'+eventos[i]["id"]+'"},{';
			}
		}

		console.log(JSON.parse(filtro_eventos));
		//console.log(filtro_eventos);
		var listado_eventos = JSON.parse(filtro_eventos);

		var calendarEl = document.getElementById("calendarioEventos");
		var calendar = new FullCalendar.Calendar(calendarEl,{
		  //initialView: 'dayGridMonth'
		  locale: 'es',
		  headerToolbar: {
		    left  : 'prev,next today',
		    center: 'title',
		    right : 'dayGridMonth,timeGridWeek,timeGridDay'
		  },
		  themeSystem: 'bootstrap',
		  //Random default events
		  events: listado_eventos,
		  editable  : true,
		  droppable : true, // this allows things to be dropped onto the calendar !!!
		  drop      : function(info) {
		    // is the "remove after drop" checkbox checked?
		    if (checkbox.checked) {
		      // if so, remove the element from the "Draggable Events" list
		      info.draggedEl.parentNode.removeChild(info.draggedEl);
		    }
		  }
		});
		calendar.render();

	}
	
	$( '.todo-dia' ).on( 'click', function() {
	    if( $(this).is(':checked') ){
	        $('#allDay').val("true");
	        $('#hora-inicio').prop("disabled", true);
	        $('#fecha-final').prop("disabled", true);
	        $('#hora-final').prop("disabled", true);
	    } else {
	        $('#allDay').val("false");
	        $('#hora-inicio').prop("disabled", false);
	        $('#fecha-final').prop("disabled", false);
	        $('#hora-final').prop("disabled", false);
	    }
	});


	/*----------  Seleccionador de colores  ----------*/

	var chequeado = "";
	$(document).on("click", ".text-purple", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-purple");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-purple");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#purple-icono').removeClass();
		$('#purple-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#purple-icono";
		$('#color').val('#605ca8');
	})
	$(document).on("click", ".text-indigo", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-indigo");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-indigo");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#indigo-icono').removeClass();
		$('#indigo-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#indigo-icono";
		$('#color').val('#6610f2');
	})
	$(document).on("click", ".text-navy", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-navy");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-navy");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#navy-icono').removeClass();
		$('#navy-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#navy-icono";
		$('#color').val('#001f3f');
	})
	$(document).on("click", ".text-primary", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-primary");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-primary");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#primary-icono').removeClass();
		$('#primary-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#primary-icono";
		$('#color').val('#007bff');
	})
	$(document).on("click", ".text-lightblue", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-lightblue");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-lightblue");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#lightblue-icono').removeClass();
		$('#lightblue-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#lightblue-icono";
		$('#color').val('#3c8dbc');
	})
	$(document).on("click", ".text-info", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-info");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-info");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#info-icono').removeClass();
		$('#info-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#info-icono";
		$('#color').val('#17a2b8');
	})
	$(document).on("click", ".text-teal", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-teal");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-teal");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#teal-icono').removeClass();
		$('#teal-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#teal-icono";
		$('#color').val('#39cccc');
	})
	$(document).on("click", ".text-olive", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-olive");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-olive");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#olive-icono').removeClass();
		$('#olive-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#olive-icono";
		$('#color').val('#3d9970');
	})
	$(document).on("click", ".text-success", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-success");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-success");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#success-icono').removeClass();
		$('#success-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#success-icono";
		$('#color').val('#28a745');
	})
	$(document).on("click", ".text-lime", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-lime");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-lime");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#lime-icono').removeClass();
		$('#lime-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#lime-icono";
		$('#color').val('#01ff70');
	})
	$(document).on("click", ".text-warning", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-warning");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-warning");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#warning-icono').removeClass();
		$('#warning-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#warning-icono";
		$('#color').val('#ffc107');
	})
	$(document).on("click", ".text-orange", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-orange");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-orange");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#orange-icono').removeClass();
		$('#orange-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#orange-icono";
		$('#color').val('#ff851b');
	})
	$(document).on("click", ".text-danger", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-danger");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-danger");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#danger-icono').removeClass();
		$('#danger-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#danger-icono";
		$('#color').val('#dc3545');
	})
	$(document).on("click", ".text-maroon", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-maroon");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-maroon");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#maroon-icono').removeClass();
		$('#maroon-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#maroon-icono";
		$('#color').val('#d81b60');
	})
	$(document).on("click", ".text-pink", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-pink");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-pink");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#pink-icono').removeClass();
		$('#pink-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#pink-icono";
		$('#color').val('#e83e8c');
	})
	$(document).on("click", ".text-fuchsia", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-fuchsia");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-fuchsia");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#fuchsia-icono').removeClass();
		$('#fuchsia-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#fuchsia-icono";
		$('#color').val('#f012be');
	})
	$(document).on("click", ".text-light", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-light");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-light");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#light-icono').removeClass();
		$('#light-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#light-icono";
		$('#color').val('#1f2d3d');
	})
	$(document).on("click", ".text-secondary", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-secondary");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-secondary");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#secondary-icono').removeClass();
		$('#secondary-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#secondary-icono";
		$('#color').val('#6c757d');
	})
	$(document).on("click", ".text-gray", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-gray");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-gray");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#gray-icono').removeClass();
		$('#gray-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#gray-icono";
		$('#color').val('#adb5bd');
	})
	$(document).on("click", ".text-gray-dark", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-gray-dark");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-gray-dark");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#gray-dark-icono').removeClass();
		$('#gray-dark-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#gray-dark-icono";
		$('#color').val('#343a40');
	})
	$(document).on("click", ".text-black", function(){
		$('#cabecera').removeClass();
		$('#cabecera').addClass("modal-header").addClass("bg-black");
		$('#pie').removeClass();
		$('#pie').addClass("modal-header").addClass("bg-black");
		$('#cerrar').removeClass();
		$('#cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#guardar').removeClass();
		$('#guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(chequeado).removeClass();
		$(chequeado).addClass("fas").addClass("fa-square");
		$('#black-icono').removeClass();
		$('#black-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#black-icono";
		$('#color').val('#000000');
	})

	/*----------  Ingresar actividad  ----------*/
	
	var actividad_chequeado = "";
	$(document).on("click", ".text-purple", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-purple");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-purple");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-purple-icono').removeClass();
		$('#actividad-purple-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-purple-icono";
		$('#actividad-color').val('#605ca8');
	})
	$(document).on("click", ".text-indigo", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-indigo");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-indigo");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-indigo-icono').removeClass();
		$('#actividad-indigo-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-indigo-icono";
		$('#actividad-color').val('#6610f2');
	})
	$(document).on("click", ".text-navy", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-navy");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-navy");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-navy-icono').removeClass();
		$('#actividad-navy-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-navy-icono";
		$('#actividad-color').val('#001f3f');
	})
	$(document).on("click", ".text-primary", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-primary");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-primary");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-primary-icono').removeClass();
		$('#actividad-primary-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-primary-icono";
		$('#actividad-color').val('#007bff');
	})
	$(document).on("click", ".text-lightblue", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-lightblue");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-lightblue");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-lightblue-icono').removeClass();
		$('#actividad-lightblue-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-lightblue-icono";
		$('#actividad-color').val('#3c8dbc');
	})
	$(document).on("click", ".text-info", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-info");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-info");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-info-icono').removeClass();
		$('#actividad-info-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-info-icono";
		$('#actividad-color').val('#17a2b8');
	})
	$(document).on("click", ".text-teal", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-teal");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-teal");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-teal-icono').removeClass();
		$('#actividad-teal-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-teal-icono";
		$('#actividad-color').val('#39cccc');
	})
	$(document).on("click", ".text-olive", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-olive");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-olive");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-olive-icono').removeClass();
		$('#actividad-olive-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-olive-icono";
		$('#actividad-color').val('#3d9970');
	})
	$(document).on("click", ".text-success", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-success");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-success");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-success-icono').removeClass();
		$('#actividad-success-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-success-icono";
		$('#actividad-color').val('#28a745');
	})
	$(document).on("click", ".text-lime", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-lime");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-lime");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-lime-icono').removeClass();
		$('#actividad-lime-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-lime-icono";
		$('#actividad-color').val('#01ff70');
	})
	$(document).on("click", ".text-warning", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-warning");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-warning");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-warning-icono').removeClass();
		$('#actividad-warning-icono').addClass("fas").addClass("fa-check-square");
		chequeado = "#actividad-warning-icono";
		$('#actividad-color').val('#ffc107');
	})
	$(document).on("click", ".text-orange", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-orange");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-orange");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-orange-icono').removeClass();
		$('#actividad-orange-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-orange-icono";
		$('#actividad-color').val('#ff851b');
	})
	$(document).on("click", ".text-danger", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-danger");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-danger");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-danger-icono').removeClass();
		$('#actividad-danger-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-danger-icono";
		$('#actividad-color').val('#dc3545');
	})
	$(document).on("click", ".text-maroon", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-maroon");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-maroon");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-maroon-icono').removeClass();
		$('#actividad-maroon-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-maroon-icono";
		$('#actividad-color').val('#d81b60');
	})
	$(document).on("click", ".text-pink", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-pink");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-pink");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-pink-icono').removeClass();
		$('#actividad-pink-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-pink-icono";
		$('#actividad-color').val('#e83e8c');
	})
	$(document).on("click", ".text-fuchsia", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-fuchsia");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-fuchsia");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-fuchsia-icono').removeClass();
		$('#actividad-fuchsia-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-fuchsia-icono";
		$('#actividad-color').val('#f012be');
	})
	$(document).on("click", ".text-light", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-light");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-light");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-light-icono').removeClass();
		$('#actividad-light-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-light-icono";
		$('#actividad-color').val('#1f2d3d');
	})
	$(document).on("click", ".text-secondary", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-secondary");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-secondary");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-secondary-icono').removeClass();
		$('#actividad-secondary-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-secondary-icono";
		$('#actividad-color').val('#6c757d');
	})
	$(document).on("click", ".text-gray", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-gray");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-gray");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-gray-icono').removeClass();
		$('#actividad-gray-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-gray-icono";
		$('#actividad-color').val('#adb5bd');
	})
	$(document).on("click", ".text-gray-dark", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-gray-dark");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-gray-dark");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-gray-dark-icono').removeClass();
		$('#actividad-gray-dark-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-gray-dark-icono";
		$('#actividad-color').val('#343a40');
	})
	$(document).on("click", ".text-black", function(){
		$('#actividad-cabecera').removeClass();
		$('#actividad-cabecera').addClass("modal-header").addClass("bg-black");
		$('#actividad-pie').removeClass();
		$('#actividad-pie').addClass("modal-header").addClass("bg-black");
		$('#actividad-cerrar').removeClass();
		$('#actividad-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#actividad-guardar').removeClass();
		$('#actividad-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(actividad_chequeado).removeClass();
		$(actividad_chequeado).addClass("fas").addClass("fa-square");
		$('#actividad-black-icono').removeClass();
		$('#actividad-black-icono').addClass("fas").addClass("fa-check-square");
		actividad_chequeado = "#actividad-black-icono";
		$('#actividad-color').val('#000000');
	})


	/*----------  Editar evento  ----------*/

	$( '.editar-todo-dia' ).on( 'click', function() {
	    if( $(this).is(':checked') ){
	        $('#editar-allDay').val("true");
	        $('#editar-hora-inicio').prop("disabled", true);
	        $('#editar-fecha-final').prop("disabled", true);
	        $('#editar-hora-final').prop("disabled", true);
	    } else {
	        $('#editar-allDay').val("false");
	        $('#editar-hora-inicio').prop("disabled", false);
	        $('#editar-fecha-final').prop("disabled", false);
	        $('#editar-hora-final').prop("disabled", false);
	    }
	});

	var editar_chequeado = "";

	$(document).on("click", ".editar-purple", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-purple");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-purple");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-purple-icono').removeClass();
		$('#editar-purple-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-purple-icono";
		$('#editar-color').val('#605ca8');
	})
	$(document).on("click", ".editar-indigo", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-indigo");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-indigo");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-indigo-icono').removeClass();
		$('#editar-indigo-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-indigo-icono";
		$('#editar-color').val('#6610f2');
	})
	$(document).on("click", ".editar-navy", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-navy");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-navy");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-navy-icono').removeClass();
		$('#editar-navy-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-navy-icono";
		$('#editar-color').val('#001f3f');
	})
	$(document).on("click", ".editar-primary", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-primary");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-primary");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-primary-icono').removeClass();
		$('#editar-primary-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-primary-icono";
		$('#editar-color').val('#007bff');
	})
	$(document).on("click", ".editar-lightblue", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-lightblue");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-lightblue");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-lightblue-icono').removeClass();
		$('#editar-lightblue-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-lightblue-icono";
		$('#editar-color').val('#3c8dbc');
	})
	$(document).on("click", ".editar-info", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-info");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-info");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-info-icono').removeClass();
		$('#editar-info-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-info-icono";
		$('#editar-color').val('#17a2b8');
	})
	$(document).on("click", ".editar-teal", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-teal");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-teal");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-teal-icono').removeClass();
		$('#editar-teal-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-teal-icono";
		$('#editar-color').val('#39cccc');
	})
	$(document).on("click", ".editar-olive", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-olive");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-olive");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-olive-icono').removeClass();
		$('#editar-olive-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-olive-icono";
		$('#editar-color').val('#3d9970');
	})
	$(document).on("click", ".editar-success", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-success");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-success");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-success-icono').removeClass();
		$('#editar-success-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-success-icono";
		$('#editar-color').val('#28a745');
	})
	$(document).on("click", ".editar-lime", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-lime");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-lime");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-lime-icono').removeClass();
		$('#editar-lime-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-lime-icono";
		$('#editar-color').val('#01ff70');
	})
	$(document).on("click", ".editar-warning", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-warning");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-warning");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-warning-icono').removeClass();
		$('#editar-warning-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-warning-icono";
		$('#editar-color').val('#ffc107');
	})
	$(document).on("click", ".editar-orange", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-orange");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-orange");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-orange-icono').removeClass();
		$('#editar-orange-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-orange-icono";
		$('#editar-color').val('#ff851b');
	})
	$(document).on("click", ".editar-danger", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-danger");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-danger");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-danger-icono').removeClass();
		$('#editar-danger-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-danger-icono";
		$('#editar-color').val('#dc3545');
	})
	$(document).on("click", ".editar-maroon", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-maroon");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-maroon");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-maroon-icono').removeClass();
		$('#editar-maroon-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-maroon-icono";
		$('#editar-color').val('#d81b60');
	})
	$(document).on("click", ".editar-pink", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-pink");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-pink");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-pink-icono').removeClass();
		$('#editar-pink-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-pink-icono";
		$('#editar-color').val('#e83e8c');
	})
	$(document).on("click", ".editar-fuchsia", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-fuchsia");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-fuchsia");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-fuchsia-icono').removeClass();
		$('#editar-fuchsia-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-fuchsia-icono";
		$('#editar-color').val('#f012be');
	})
	$(document).on("click", ".editar-light", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-light");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-light");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-light-icono').removeClass();
		$('#editar-light-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-light-icono";
		$('#editar-color').val('#1f2d3d');
	})
	$(document).on("click", ".editar-secondary", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-secondary");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-secondary");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-secondary-icono').removeClass();
		$('#editar-secondary-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-secondary-icono";
		$('#editar-color').val('#6c757d');
	})
	$(document).on("click", ".editar-gray", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-gray");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-gray");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-gray-icono').removeClass();
		$('#editar-gray-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-gray-icono";
		$('#editar-color').val('#adb5bd');
	})
	$(document).on("click", ".editar-gray-dark", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-gray-dark");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-gray-dark");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#gray-dark-icono').removeClass();
		$('#gray-dark-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-gray-dark-icono";
		$('#editar-color').val('#343a40');
	})
	$(document).on("click", ".editar-black", function(){
		$('#editar-cabecera').removeClass();
		$('#editar-cabecera').addClass("modal-header").addClass("bg-black");
		$('#editar-pie').removeClass();
		$('#editar-pie').addClass("modal-header").addClass("bg-black");
		$('#editar-cerrar').removeClass();
		$('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$('#editar-guardar').removeClass();
		$('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-light");
		$(editar_chequeado).removeClass();
		$(editar_chequeado).addClass("fas").addClass("fa-square");
		$('#editar-black-icono').removeClass();
		$('#editar-black-icono').addClass("fas").addClass("fa-check-square");
		editar_chequeado = "#editar-black-icono";
		$('#editar-color').val('#000000');
	})
	
}


if (document.getElementById("citas_afiliados") || document.getElementById("citas_afiliados")) {

	var citas_afiliados = JSON.parse($("#citas_afiliados").val());
	var total_citas_afiliados = $("#totalCitasAfiliados").val();

	var citas_interesados = JSON.parse($("#citas_interesados").val());
	var total_citas_interesados = $("#totalCitasInteresados").val();

	var citas = "[{";

	for (var i = 0; i < total_citas_afiliados; i++) {
		if ((i == (total_citas_afiliados-1)) && (total_citas_interesados == 0)) {
			citas = citas + '"title":"' + citas_afiliados[i]["primer_nombre"] + ' ' + citas_afiliados[i]["segundo_nombre"] + ' ' + citas_afiliados[i]["primer_apellido"] + ' ' + citas_afiliados[i]["segundo_apellido"] + ' - ' + citas_afiliados[i]["razon_social"] + '",';
			citas = citas + '"start":"' + citas_afiliados[i]["fecha_cita"] + ' ' + citas_afiliados[i]["hora_cita"] + '",';
			citas = citas + '"backgroundColor":"' + citas_afiliados[i]["color"] + '","borderColor":"' + citas_afiliados[i]["color"] + '",';
			citas = citas + '"url":"' + ruta + '/citas/general/' + citas_afiliados[i]["id"]+ '"}]';
		} else {
			citas = citas + '"title":"' + citas_afiliados[i]["primer_nombre"] + ' ' + citas_afiliados[i]["segundo_nombre"] + ' ' + citas_afiliados[i]["primer_apellido"] + ' ' + citas_afiliados[i]["segundo_apellido"] + ' - ' + citas_afiliados[i]["razon_social"] + '",';
			citas = citas + '"start":"' + citas_afiliados[i]["fecha_cita"] + ' ' + citas_afiliados[i]["hora_cita"] + '",';
			citas = citas + '"backgroundColor":"' + citas_afiliados[i]["color"] + '","borderColor":"' + citas_afiliados[i]["color"] + '",';
			citas = citas + '"url":"' + ruta + '/citas/general/' + citas_afiliados[i]["id"]+ '"},{';
		}
	}

	for (var i = 0; i < total_citas_interesados; i++) {
		if (i == (total_citas_interesados-1)) {
			citas = citas + '"title":"' + citas_interesados[i]["nombre_interesado"] + ' - ' + citas_interesados[i]["cc_interesado"] + '",';
			citas = citas + '"start":"' + citas_interesados[i]["fecha_cita"] + ' ' + citas_interesados[i]["hora_cita"] + '",';
			citas = citas + '"backgroundColor":"' + citas_interesados[i]["color"] + '","borderColor":"' + citas_interesados[i]["color"] + '",';
			citas = citas + '"url":"' + ruta + '/citas/general/' + citas_interesados[i]["id"]+ '"}]';
		} else {
			citas = citas + '"title":"' + citas_interesados[i]["nombre_interesado"] + ' - ' + citas_interesados[i]["cc_interesado"] + '",';
			citas = citas + '"start":"' + citas_interesados[i]["fecha_cita"] + ' ' + citas_interesados[i]["hora_cita"] + '",';
			citas = citas + '"backgroundColor":"' + citas_interesados[i]["color"] + '","borderColor":"' + citas_interesados[i]["color"] + '",';
			citas = citas + '"url":"' + ruta + '/citas/general/' + citas_interesados[i]["id"]+ '"},{';
		}
	}

	citas = JSON.parse(citas);

	var calendarEl = document.getElementById("calendarioCitas");
	var calendar = new FullCalendar.Calendar(calendarEl,{
	  //initialView: 'dayGridMonth'
	  locale: 'es',
	  headerToolbar: {
	    left  : 'prev,next today',
	    center: 'title',
	    right : 'dayGridMonth,timeGridWeek,timeGridDay'
	  },
	  themeSystem: 'bootstrap',
	  //Random default events
	  events: citas,
	  editable  : true,
	  droppable : true, // this allows things to be dropped onto the calendar !!!
	  drop      : function(info) {
	    // is the "remove after drop" checkbox checked?
	    if (checkbox.checked) {
	      // if so, remove the element from the "Draggable Events" list
	      info.draggedEl.parentNode.removeChild(info.draggedEl);
	    }
	  }
	});
	calendar.render();
}

/*var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

var calendarEl = document.getElementById("calendarioEventos");
var calendar = new FullCalendar.Calendar(calendarEl,{
  //initialView: 'dayGridMonth'
  locale: 'es',
  headerToolbar: {
    left  : 'prev,next today',
    center: 'title',
    right : 'dayGridMonth,timeGridWeek,timeGridDay'
  },
  themeSystem: 'bootstrap',
  //Random default events
  events: [
    {
      title          : 'All Day Event',
      start          : new Date(y, m, 1),
      backgroundColor: '#f56954', //red
      borderColor    : '#f56954', //red
      allDay         : true
    },
    {
      title          : 'Long Event',
      start          : new Date(y, m, d - 5),
      end            : new Date(y, m, d - 2),
      backgroundColor: '#f39c12', //yellow
      borderColor    : '#f39c12' //yellow
    },
    {
      title          : 'Meeting',
      start          : new Date(y, m, d, 10, 30),
      allDay         : false,
      backgroundColor: '#0073b7', //Blue
      borderColor    : '#0073b7' //Blue
    },
    {
      title          : 'Lunch',
      start          : new Date(y, m, d, 12, 0),
      end            : new Date(y, m, d, 14, 0),
      allDay         : false,
      backgroundColor: '#00c0ef', //Info (aqua)
      borderColor    : '#00c0ef' //Info (aqua)
    },
    {
      title          : 'Birthday Party',
      start          : new Date(y, m, d + 1, 19, 0),
      end            : new Date(y, m, d + 1, 22, 30),
      allDay         : false,
      backgroundColor: '#00a65a', //Success (green)
      borderColor    : '#00a65a' //Success (green)
    },
    {
      title          : 'Click for Google',
      start          : new Date(y, m, 28),
      end            : new Date(y, m, 29),
      url            : 'https://www.google.com/',
      backgroundColor: '#3c8dbc', //Primary (light-blue)
      borderColor    : '#3c8dbc' //Primary (light-blue)
    }
  ],
  editable  : true,
  droppable : true, // this allows things to be dropped onto the calendar !!!
  drop      : function(info) {
    // is the "remove after drop" checkbox checked?
    if (checkbox.checked) {
      // if so, remove the element from the "Draggable Events" list
      info.draggedEl.parentNode.removeChild(info.draggedEl);
    }
  }
});
calendar.render();*/