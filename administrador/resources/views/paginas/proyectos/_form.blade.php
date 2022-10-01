<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $proyecto->nombre) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Sector</label>
            <select class="form-control select2bs4" style="width: 100%;" name="sector_id" id="sector_id" required>
                @if (isset($proyecto->sector_id))
                <option value="{{$proyecto->sector_id}}">{{$proyecto->nombre_sector}}</option>
                @else
                <option value="">Seleccionar...</option>
                @endif
                @foreach ($sectores as $nombre_sector => $id_sector)
                    <option value="{{ $id_sector }}">{{ $nombre_sector }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="nameEditor">Descripción del proyecto</label>
                <textarea class="form-control" name="descripcion" rows="3">{{ old("descripcion", $proyecto->descripcion) }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="nameEditor">Contenido del proyecto</label>
                <textarea class="form-control summernote-sm" name="contenido" rows="10">{{ old("descripcion", $proyecto->contenido) }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group text-center">
                <label for="exampleInputFile">Imagen del proyecto</label>
                <div class="form-group my-2 text-center">
                    <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de portada
                        <input type="file" name="imagen_proyecto" value="">
                    </div>
                    <br>
                    <br>
                    @if (isset($proyecto->imagen_proyecto))
                        <img src="{{url('/')}}/vistas/images/proyecto/{{$proyecto->imagen_proyecto}}" alt="{{$proyecto->imagen_proyecto}}">
                    @else
                        <img class="previsualizarImg_imagen_proyecto img-fluid py-2">
                    @endif
                    <p class="help-block small">Dimensiones: 1024px * 250px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        //File-input
        bsCustomFileInput.init();
    })
</script>
