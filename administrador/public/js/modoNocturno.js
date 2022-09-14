document.getElementById("cuerpoPagina").classList.add('dark-mode');
document.getElementById("headerNav").classList.remove('navbar-white', 'navbar-light');
document.getElementById("headerNav").classList.add('navbar-dark');
if (document.getElementById("carruselActivo")) {
	document.getElementById("carruselActivo").classList.add('dark-mode');
}
if (document.getElementById("carruselSegundario")) {
	document.getElementById("carruselSegundario").classList.add('dark-mode');
}
if (document.getElementById("aliadosActivo")) {
	document.getElementById("aliadosActivo").classList.add('dark-mode');
}
if (document.getElementById("aliadosSegundario")) {
	document.getElementById("aliadosSegundario").classList.add('dark-mode');	
}
if (document.getElementById("tablaNoticias")) {
	document.getElementById("tablaNoticias").classList.remove('table-striped');
}
if (document.getElementById("tablaAfiliados")) {
	document.getElementById("tablaAfiliados").classList.remove('table-hover');
}
if (document.getElementById("tablaAfiliado")) {
	document.getElementById("tipo_documento").style.background="000000";
	document.getElementById("num_cedula").style.background="000000";
	document.getElementById("nombre_completo").style.background="000000";
	document.getElementById("genero").style.background="000000";
	document.getElementById("fecha_nacimiento").style.background="000000";
	document.getElementById("email").style.background="000000";
	document.getElementById("telefono").style.background="000000";
}
if (document.getElementById("example1")) {
	document.getElementById("example1").classList.remove('table-striped');
}
if (document.getElementById("tablaEmpresas")) {
	document.getElementById("tablaEmpresas").classList.remove('table-hover');
}
if (document.getElementById("descripcionEmpresa")) {
	document.getElementById("nit").style.background="000000";
	document.getElementById("razon_social").style.background="000000";
	document.getElementById("representante").style.background="000000";
	document.getElementById("numero_empleados").style.background="000000";
	document.getElementById("direccion").style.background="000000";
	document.getElementById("telefono").style.background="000000";
	document.getElementById("fax").style.background="000000";
	document.getElementById("celular").style.background="000000";
	document.getElementById("correo_electronico").style.background="000000";
	document.getElementById("sector").style.background="000000";
	document.getElementById("productos").style.background="000000";
	document.getElementById("ciudad").style.background="000000";
	document.getElementById("estado").style.background="000000";
	document.getElementById("pagos_atrasados").style.background="000000";
	document.getElementById("fecha_afiliacion").style.background="000000";
}
if (document.getElementById("tablaExportarEmpresas")) {
	document.getElementById("tablaExportarEmpresas").classList.remove('table-striped');
}
if (document.getElementById("tablaUsuarios")) {
	document.getElementById("tablaUsuarios").classList.remove('table-striped');
}
if (document.getElementById("tablaAfiliadosEmpleados")) {
	document.getElementById("tablaAfiliadosEmpleados").classList.remove('table-hover');
}
if (document.getElementById("tablaBirthdayAfiliadosEmpleados")) {
	document.getElementById("tablaBirthdayAfiliadosEmpleados").classList.remove('table-hover');
}
if (document.getElementById("tablaPagos")) {
	document.getElementById("tablaPagos").classList.remove('table-striped');
}
if (document.getElementById("tablaEmpresasInactivas")) {
	document.getElementById("tablaEmpresasInactivas").classList.remove('table-striped');
}
if (document.getElementById("tablaEmpleados")) {
	document.getElementById("tablaEmpleados").classList.remove('table-striped');
}