@extends('admin.layout.app')
@section('title', 'Divulgar')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('msg'))
                        <div class="alert alert-success text-center">
                            {{ session('msg') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Classificado</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">Divulgar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- /.card-body -->
                        <form action="{{ route('admin.pages.classificado.store', ['id' => 1]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="customFile">Imagem principal</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" required class="custom-file-input"
                                                placeholder="800x800px" id="customFile">
                                            <label class="custom-file-label" for="customFile">Imagem</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Categoria</label>
                                        <select class="custom-select rounded-0" name="cat_id">
                                            @foreach ($cat as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Titulo</label>
                                        <div class="custom-file">
                                            <input type="text" name="title" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Descrição</label>
                                        <div class="custom-file">
                                            <input type="text" name="desc" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Valor</label>
                                        <div class="custom-file">
                                            <input type="text" class="form-control" required maxlength="15" name="valor"
                                                style="width: 250px;"
                                                onkeypress="return(moeda(this,'.',',',event))">

                                            <!-- <input type="number" name="valor" required class="form-control"> -->
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="customFile">Conteúdo</label>
                                        <textarea id="editor" name="content"></textarea>
                                    </div> --}}
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>

                            </div>
                        </form>
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