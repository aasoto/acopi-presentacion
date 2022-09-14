var indice = "";
var edit_color_fondo_1, edit_color_fondo_2;
var edit_boton_1_chequeado, edit_boton_2_chequeado;
function obtenerIndice(comp){
	indice = comp;
	console.log(indice);
	/*===============================
	=            Boton 1            =
	===============================*/
	
	$(document).on("click", "#boton-1-text-purple-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-1-muestra-'+indice).addClass("bg-purple");
		edit_color_fondo_1 = "bg-purple";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-purple-icono-'+indice).removeClass();
		$('#boton-1-purple-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-purple-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-purple');
	})
	$(document).on("click", "#boton-1-text-indigo-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-indigo");
		edit_color_fondo_1 = "bg-indigo";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-indigo-icono-'+indice).removeClass();
		$('#boton-1-indigo-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-indigo-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-indigo');
	})
	$(document).on("click", "#boton-1-text-navy-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-navy");
		edit_color_fondo_1 = "bg-navy";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-navy-icono-'+indice).removeClass();
		$('#boton-1-navy-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-navy-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-navy');
	})
	$(document).on("click", "#boton-1-text-primary-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-primary");
		edit_color_fondo_1 = "bg-primary";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-primary-icono-'+indice).removeClass();
		$('#boton-1-primary-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-primary-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-primary');
	})
	$(document).on("click", "#boton-1-text-lightblue-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-lightblue");
		edit_color_fondo_1 = "bg-lightblue";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-lightblue-icono-'+indice).removeClass();
		$('#boton-1-lightblue-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-lightblue-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-lightblue');
	})
	$(document).on("click", "#boton-1-text-info-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-info");
		edit_color_fondo_1 = "bg-info";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-info-icono-'+indice).removeClass();
		$('#boton-1-info-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-info-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-info');
	})
	$(document).on("click", "#boton-1-text-teal-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-teal");
		edit_color_fondo_1 = "bg-teal";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-teal-icono-'+indice).removeClass();
		$('#boton-1-teal-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-teal-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-teal');
	})
	$(document).on("click", "#boton-1-text-olive-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-olive");
		edit_color_fondo_1 = "bg-olive";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-olive-icono-'+indice).removeClass();
		$('#boton-1-olive-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-olive-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-olive');
	})
	$(document).on("click", "#boton-1-text-success-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-success");
		edit_color_fondo_1 = "bg-success";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-success-icono-'+indice).removeClass();
		$('#boton-1-success-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-success-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-success');
	})
	$(document).on("click", "#boton-1-text-lime-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-2-muestra-'+indice).addClass("bg-lime");
		edit_color_fondo_1 = "bg-lime";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-lime-icono-'+indice).removeClass();
		$('#boton-1-lime-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-lime-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-lime');
	})
	$(document).on("click", "#boton-1-text-warning-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-warning");
		edit_color_fondo_1 = "bg-warning";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-warning-icono-'+indice).removeClass();
		$('#boton-1-warning-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-warning-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-warning');
	})
	$(document).on("click", "#boton-1-text-orange-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-orange");
		edit_color_fondo_1 = "bg-orange";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-orange-icono-'+indice).removeClass();
		$('#boton-1-orange-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-orange-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-orange');
	})
	$(document).on("click", "#boton-1-text-danger-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-danger");
		edit_color_fondo_1 = "bg-danger";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-danger-icono-'+indice).removeClass();
		$('#boton-1-danger-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-danger-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-danger');
	})
	$(document).on("click", "#boton-1-text-maroon-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-maroon");
		edit_color_fondo_1 = "bg-maroon";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-maroon-icono-'+indice).removeClass();
		$('#boton-1-maroon-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-maroon-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-maroon');
	})
	$(document).on("click", "#boton-1-text-pink-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-pink");
		edit_color_fondo_1 = "bg-pink";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-pink-icono-'+indice).removeClass();
		$('#boton-1-pink-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-pink-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-pink');
	})
	$(document).on("click", "#boton-1-text-fuchsia-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-fuchsia");
		edit_color_fondo_1 = "bg-fuchsia";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-fuchsia-icono-'+indice).removeClass();
		$('#boton-1-fuchsia-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-fuchsia-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-fuchsia');
	})
	$(document).on("click", "#boton-1-text-light-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-light");
		edit_color_fondo_1 = "bg-light";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-light-icono-'+indice).removeClass();
		$('#boton-1-light-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-light-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-light');
	})
	$(document).on("click", "#boton-1-text-secondary-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-secondary");
		edit_color_fondo_1 = "bg-secondary";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-secondary-icono-'+indice).removeClass();
		$('#boton-1-secondary-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-secondary-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-secondary');
	})
	$(document).on("click", "#boton-1-text-gray-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-gray");
		edit_color_fondo_1 = "bg-gray";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-gray-icono-'+indice).removeClass();
		$('#boton-1-gray-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-gray-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-gray');
	})
	$(document).on("click", "#boton-1-text-gray-dark-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-gray-dark");
		edit_color_fondo_1 = "bg-gray-dark";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-gray-dark-icono-'+indice).removeClass();
		$('#boton-1-gray-dark-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-gray-dark-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-gray-dark');
	})
	$(document).on("click", "#boton-1-text-black-"+indice, function(){
		$('#boton-1-muestra-'+indice).removeClass(edit_color_fondo_1);
		$('#boton-1-muestra-'+indice).addClass("bg-black");
		edit_color_fondo_1 = "bg-black";
		$(edit_boton_1_chequeado).removeClass();
		$(edit_boton_1_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-1-black-icono-'+indice).removeClass();
		$('#boton-1-black-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_1_chequeado = "#boton-1-black-icono-"+indice;
		$('#boton-1-color-'+indice).val('bg-black');
	})
	
	/*=====  End of Boton 1  ======*/

	/*===============================
	=            Boton 2            =
	===============================*/
	
	$(document).on("click", "#boton-2-text-purple-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-purple");
		edit_color_fondo_2 = "bg-purple";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-purple-icono-'+indice).removeClass();
		$('#boton-2-purple-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-purple-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-purple');
	})
	$(document).on("click", "#boton-2-text-indigo-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-indigo");
		edit_color_fondo_2 = "bg-indigo";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-indigo-icono-'+indice).removeClass();
		$('#boton-2-indigo-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-indigo-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-indigo');
	})
	$(document).on("click", "#boton-2-text-navy-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-navy");
		edit_color_fondo_2 = "bg-navy";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-navy-icono-'+indice).removeClass();
		$('#boton-2-navy-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-navy-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-navy');
	})
	$(document).on("click", "#boton-2-text-primary-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-primary");
		edit_color_fondo_2 = "bg-primary";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-primary-icono-'+indice).removeClass();
		$('#boton-2-primary-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-primary-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-primary');
	})
	$(document).on("click", "#boton-2-text-lightblue-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-lightblue");
		edit_color_fondo_2 = "bg-lightblue";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-lightblue-icono-'+indice).removeClass();
		$('#boton-2-lightblue-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-lightblue-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-lightblue');
	})
	$(document).on("click", "#boton-2-text-info-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-info");
		edit_color_fondo_2 = "bg-info";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-info-icono-'+indice).removeClass();
		$('#boton-2-info-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-info-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-info');
	})
	$(document).on("click", "#boton-2-text-teal-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-teal");
		edit_color_fondo_2 = "bg-teal";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-teal-icono-'+indice).removeClass();
		$('#boton-2-teal-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-teal-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-teal');
	})
	$(document).on("click", "#boton-2-text-olive-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-olive");
		edit_color_fondo_2 = "bg-olive";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-olive-icono-'+indice).removeClass();
		$('#boton-2-olive-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-olive-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-olive');
	})
	$(document).on("click", "#boton-2-text-success-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-success");
		edit_color_fondo_2 = "bg-success";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-success-icono-'+indice).removeClass();
		$('#boton-2-success-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-success-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-success');
	})
	$(document).on("click", "#boton-2-text-lime-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-lime");
		edit_color_fondo_2 = "bg-lime";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-lime-icono-'+indice).removeClass();
		$('#boton-2-lime-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-lime-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-lime');
	})
	$(document).on("click", "#boton-2-text-warning-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-warning");
		edit_color_fondo_2 = "bg-warning";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-warning-icono-'+indice).removeClass();
		$('#boton-2-warning-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-warning-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-warning');
	})
	$(document).on("click", "#boton-2-text-orange-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-orange");
		edit_color_fondo_2 = "bg-orange";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-orange-icono-'+indice).removeClass();
		$('#boton-2-orange-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-orange-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-orange');
	})
	$(document).on("click", "#boton-2-text-danger-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-danger");
		edit_color_fondo_2 = "bg-danger";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-danger-icono-'+indice).removeClass();
		$('#boton-2-danger-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-danger-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-danger');
	})
	$(document).on("click", "#boton-2-text-maroon-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-maroon");
		edit_color_fondo_2 = "bg-maroon";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-maroon-icono-'+indice).removeClass();
		$('#boton-2-maroon-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-maroon-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-maroon');
	})
	$(document).on("click", "#boton-2-text-pink-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-pink");
		edit_color_fondo_2 = "bg-pink";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-pink-icono-'+indice).removeClass();
		$('#boton-2-pink-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-pink-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-pink');
	})
	$(document).on("click", "#boton-2-text-fuchsia-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-fuchsia");
		edit_color_fondo_2 = "bg-fuchsia";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-fuchsia-icono-'+indice).removeClass();
		$('#boton-2-fuchsia-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-fuchsia-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-fuchsia');
	})
	$(document).on("click", "#boton-2-text-light-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-light");
		edit_color_fondo_2 = "bg-light";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-light-icono-'+indice).removeClass();
		$('#boton-2-light-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-light-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-light');
	})
	$(document).on("click", "#boton-2-text-secondary-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-secondary");
		edit_color_fondo_2 = "bg-secondary";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-secondary-icono-'+indice).removeClass();
		$('#boton-2-secondary-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-secondary-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-secondary');
	})
	$(document).on("click", "#boton-2-text-gray-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-gray");
		edit_color_fondo_2 = "bg-gray";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-gray-icono-'+indice).removeClass();
		$('#boton-2-gray-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-gray-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-gray');
	})
	$(document).on("click", "#boton-2-text-gray-dark-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-gray-dark");
		edit_color_fondo_2 = "bg-gray-dark";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-gray-dark-icono-'+indice).removeClass();
		$('#boton-2-gray-dark-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-gray-dark-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-gray-dark');
	})
	$(document).on("click", "#boton-2-text-black-"+indice, function(){
		$('#boton-2-muestra-'+indice).removeClass(edit_color_fondo_2);
		$('#boton-2-muestra-'+indice).addClass("bg-black");
		edit_color_fondo_2 = "bg-black";
		$(edit_boton_2_chequeado).removeClass();
		$(edit_boton_2_chequeado).addClass("fas").addClass("fa-square");
		$('#boton-2-black-icono-'+indice).removeClass();
		$('#boton-2-black-icono-'+indice).addClass("fas").addClass("fa-check-square");
		edit_boton_2_chequeado = "#boton-2-black-icono-"+indice;
		$('#boton-2-color-'+indice).val('bg-black');
	})
	
	/*=====  End of Boton 2  ======*/


}


