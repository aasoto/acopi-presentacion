
$("input[type='file']").change(function(){

	var archivo = this.files[0];
	var tipo = $(this).attr("name");

	if (tipo == "carta_bienvenida" || tipo == "acta_compromiso" || tipo == "estudio_afiliacion" || tipo == "rut" || tipo == "camara_comercio" || tipo == "fechas_birthday") {
		console.log("tipo: ", archivo["type"]);
		if(archivo["type"] != "application/pdf"){

			$("input[type='file']").val("");

		  	swal({
		  		title: "¡Error!",
		  		text: "¡El archivo debe estar en formato PDF .pdf!",
		  		type: "error"
		  	});

		}else if(archivo["size"] > 10000000){

			$("input[type='file']").val("");

			swal({
		  		title: "¡Error!",
		  		text: "¡La archivo no debe pesar más de 10MB!",
		  		type: "error"
		  	});

		}
	} else if (tipo == "hoja_de_vida") {
		if(archivo["type"] != "application/pdf"){

			$("input[type='file']").val("");

		  	swal({
		  		title: "¡Error!",
		  		text: "¡La archivo debe estar  en formato PDF .pdf!",
		  		type: "error"
		  	});

		}else if(archivo["size"] > 10000000){

			$("input[type='file']").val("");

			swal({
		  		title: "¡Error!",
		  		text: "¡El archivo no debe pesar más de 10MB!",
		  		type: "error"
		  	});

		}
	} else if (tipo == "cedula") {
		if(archivo["type"] != "application/pdf" && archivo["type"] != "image/jpeg" && archivo["type"] != "image/png"){

			$("input[type='file']").val("");

		  	swal({
		  		title: "¡Error!",
		  		text: "¡El archivo debe estar en los siguientes formatos PDF .pdf, JPG .jpg .jpeg o PNG .png!",
		  		type: "error"
		  	});

		}else if(archivo["size"] > 10000000){

			$("input[type='file']").val("");

			swal({
		  		title: "¡Error!",
		  		text: "¡El archivo no debe pesar más de 10MB!",
		  		type: "error"
		  	});

		}else{

			if(archivo["type"] == "image/jpeg" || archivo["type"] == "image/png") {
				var datosImagen = new FileReader;
				datosImagen.readAsDataURL(archivo);
				$(datosImagen).on("load", function(event){
					var rutaImagen = event.target.result;
					$(".previsualizarImg_"+tipo).attr("src", rutaImagen);
				})
			}

		}
	} else if (tipo == "archivo_documento") {
		if(archivo["type"] != "application/pdf" && archivo["type"] != "image/jpeg" && archivo["type"] != "image/png"){

			$("input[type='file']").val("");

		  	swal({
		  		title: "¡Error!",
		  		text: "¡El archivo debe estar en los siguientes formatos PDF .pdf, JPG .jpg .jpeg o PNG .png!",
		  		type: "error"
		  	});

		}else if(archivo["size"] > 2000000){

			$("input[type='file']").val("");

			swal({
		  		title: "¡Error!",
		  		text: "¡El archivo no debe pesar más de 2MB!",
		  		type: "error"
		  	});

		}else{

			if(archivo["type"] == "image/jpeg" || archivo["type"] == "image/png") {
				var datosImagen = new FileReader;
				datosImagen.readAsDataURL(archivo);
				$(datosImagen).on("load", function(event){
					var rutaImagen = event.target.result;
					$(".previsualizarImg_"+tipo).attr("src", rutaImagen);
				})
			}

			if (archivo["type"] == "application/pdf") {
				$(".logoPDF").append(`
					<i class="fas fa-file-pdf" style="color: #E60026; font-size: 300px;"></i>
				`)
			}
			

		}
	} else {
		if(archivo["type"] != "image/jpeg" && archivo["type"] != "image/png"){

			$("input[type='file']").val("");

		  	swal({
		  		title: "¡Error!",
		  		text: "¡La imagen debe estar en formato JPG o PNG!",
		  		type: "error"
		  	});

		}else if(archivo["size"] > 2000000){

			$("input[type='file']").val("");

			swal({
		  		title: "¡Error!",
		  		text: "¡La imagen no debe pesar más de 2MB!",
		  		type: "error"
		  	});

		}else{

			var datosImagen = new FileReader;
			datosImagen.readAsDataURL(archivo);

			$(datosImagen).on("load", function(event){

				var rutaImagen = event.target.result;

				$(".previsualizarImg_"+tipo).attr("src", rutaImagen);

			})

		}
	}

})