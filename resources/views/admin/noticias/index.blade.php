@extends("layouts.admin")
@section("titulo", "Noticias")
@section("contenido_principal")
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Noticias</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Noticias</a></li>
              <li class="breadcrumb-item active">Lista de noticias</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de noticias</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        @if(Session::has("exito"))
            <p style="color: #0e7a0e">{{ Session::get("exito") }}</p>
        @endif
        @if(Session::has("error"))
            <p style="color: #a11919a1">{{ Session::get("error") }}</p>
        @endif
        <a href="{{ route("admin.noticias.create") }}"><button class="btn btn-primary">Crear nueva noticia</button></a>
        <table class="table table-borderer">
            <thead>
                <th>Título</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($noticias as $noticia)
                    <tr>
                        <td>{{ $noticia->titulo }}</td>
                        <td>
                            <a href="{{ route("admin.noticias.show", $noticia->id) }}"><button class="btn btn-xs btn-primary">Ver</button></a>
                            <a href="{{ route("admin.noticias.edit", $noticia->id) }}"><button class="btn btn-xs btn-primary">Editar</button></a>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmarEliminacion{{ $noticia->id }}">Eliminar</button>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmarEliminacion{{ $noticia->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion de eliminacion de noticia {{ $noticia ->id}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>¿Estas seguro de eliminar la noticia: "{{$noticia->titulo}}"? </p>
                                  </div>
                                  <div class="modal-footer">
                                    <form method="POST" action="{{route("admin.noticias.destroy", $noticia->id)}}">
                                      @csrf
                                      @method('delete')
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Pie de la tabla de lista de noticias
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection