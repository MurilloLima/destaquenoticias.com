@extends('admin.layout.app')
@section('title', 'Divulgar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{ route('admin.pages.cliente.create') }}" class="btn btn-primary">Cadastrar</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Divulgar</li>
                        </ol>
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
                                            <th>Valor</th>
                                            <th style="text-align: center; width: 150px;">Fotos</th>
                                            <th>Categoria</th>
                                            <th style="width: 70px">#</th>
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
                                                        action="{{ route('admin.pages.classificado.destroy', $item->id) }}"
                                                        method="POST" style="float: right;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="Deletar"
                                                            class="btn btn-danger btn-sm">
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
