@extends('admin.layout.app')
@section('title', 'Classificados')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>Notícias</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard', ['id' => 1]) }}">Home</a></li>
                            <li class="breadcrumb-item active">Classificados</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.pages.classificados.categoria.index') }}" class="btn btn-danger">
                            Categorias+
                        </a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Classificados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger text-center" style="margin: 10px;">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li style="text-align: center">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (session('msg'))
                                            <div class="row text-center">
                                                <div class="col-md-12" \>
                                                    <div class="alert alert-success text-center"
                                                        style="color: white; margin: 10px;">
                                                        {{ session('msg') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Categoria</th>
                                            <th style="width: 130px">Imagens</th>
                                            <th>Categoria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->valor }}</td>
                                                <td>
                                                    <a href="{{ route('admin.pages.foto.index', $item->id) }}"
                                                        class="btn btn-outline-primary btn-block btn-sm">
                                                        Enviar+
                                                        <span class="badge bg-warning">{{ $item->fotos()->count() }}</span>
                                                    </a>
                                                </td>

                                                <td>{{ $item->categoria->title }}</td>
                                                <td>
                                                    <a href="{{ route('admin.pages.noticias.edit', [$item->id]) }}"
                                                        title="Editar">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form onsubmit="return confirm('Deseja excluir?');"
                                                        action="{{ route('admin.pages.classificado.destroy', [$item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            style="height: 26px">
                                                            Excluir
                                                            <ion-icon name="trash-outline"></ion-icon>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                </ul>
                            </div> --}}
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->

                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
