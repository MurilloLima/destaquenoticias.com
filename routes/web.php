<?php

use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CategoriaClassificadosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClassificadoController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InformativoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicidadeController;
use App\Http\Controllers\RegisterController;
use App\Models\Categoriaclass;
use App\Models\CategoriaClassif;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', [HomeController::class, 'index'])->name('home.pages.index');
Route::post('newsletter/', [HomeController::class, 'newsletter'])->name('home.newsletter');
Route::get('contatos/', [HomeController::class, 'index'])->name('home.pages.contatos.index');
Route::post('contatos/store', [HomeController::class, 'store'])->name('home.pages.contatos.store');
Route::get('view/{slug}', [HomeController::class, 'view'])->name('home.pages.view');
Route::get('noticias/{slug}', [HomeController::class, 'noticias'])->name('home.pages.noticias.index');
Route::post('pagamento/', [HomeController::class, 'pagamento'])->name('home.pages.pagamento.store');
Route::get('pagamento/qrcode/', [HomeController::class, 'qrcode'])->name('home.pages.pagamento.qrcode');

// classificados
Route::get('classificados/', [HomeController::class, 'classificados'])->name('home.pages.classificados.index');
Route::get('classificados/{slug}', [ClassificadoController::class, 'show'])->name('home.pages.show');

//denuncia
Route::get('denuncia/', [DenunciaController::class, 'index'])->name('home.pages.denuncia.index');
Route::get('denuncia/store', [DenunciaController::class, 'store'])->name('home.pages.denuncia.store');

//assinatura
Route::post('assinatura/store', [DenunciaController::class, 'pagamento'])->name('home.pages.pagamento.store');

//cadastro
Route::get('cadastro/', [CadastroController::class, 'index'])->name('home.pages.cadastro.index');

//registro payment
Route::post('register/user/', [RegisterController::class, 'store'])->name('home.pages.register.index');



Route::get('/dashboard', function () {
    return view('admin.pages.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sair', [HomeController::class, 'destroy'])->name('sair');

Route::middleware('auth')->group(function () {
    // categorias
    Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.pages.categoria.index');
    Route::get('/admin/categorias/create', [CategoriaController::class, 'create'])->name('admin.pages.categoria.create');
    Route::post('/admin/categorias/store', [CategoriaController::class, 'store'])->name('admin.pages.categoria.store');
    Route::get('admin/categorias/edit/{id}', [CategoriaController::class, 'edit'])->name('admin.pages.categorias.edit')->middleware(['auth']);;
    Route::post('/admin/categoria/update', [CategoriaController::class, 'update'])->name('admin.pages.categoria.update');
    Route::get('admin/categoria/delete/{id}', [CategoriaController::class, 'destroy'])->name('admin.pages.categoria.destroy')->middleware(['auth']);
    // informativo
    Route::get('/admin/info', [InformativoController::class, 'index'])->name('admin.pages.info.index');
    Route::post('/admin/info/update', [InformativoController::class, 'update'])->name('admin.pages.info.update');
    // noticias
    Route::get('/admin/noticias', [NoticiaController::class, 'index'])->name('admin.pages.noticias.index');
    Route::get('/admin/noticias/create', [NoticiaController::class, 'create'])->name('admin.pages.noticias.create');
    Route::post('/admin/noticias/store', [NoticiaController::class, 'store'])->name('admin.pages.noticias.store');
    Route::get('admin/noticias/edit/{id}', [NoticiaController::class, 'edit'])->name('admin.pages.noticias.edit')->middleware(['auth']);;
    Route::post('/admin/noticias/update', [NoticiaController::class, 'update'])->name('admin.pages.noticias.update');
    Route::get('admin/noticias/delete/{id}', [NoticiaController::class, 'destroy'])->name('admin.pages.noticias.destroy')->middleware(['auth']);;

    //publicidade
    Route::get('/admin/publicidade', [PublicidadeController::class, 'index'])->name('admin.pages.publicidade.index');
    Route::get('/admin/publicidade/create', [PublicidadeController::class, 'create'])->name('admin.pages.publicidade.create');
    Route::get('admin/publicidade/edit/{id}', [PublicidadeController::class, 'edit'])->name('admin.pages.publicidade.edit');
    Route::post('/admin/publicidade/store', [PublicidadeController::class, 'store'])->name('admin.pages.publicidade.store');
    Route::post('/admin/publicidade/update', [PublicidadeController::class, 'update'])->name('admin.pages.publicidade.update');
    Route::get('admin/publicidade/delete/{id}', [PublicidadeController::class, 'destroy'])->name('admin.pages.publicidade.destroy');

    // users
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //depoimentos
    Route::get('/admin/depoimento', [DepoimentoController::class, 'index'])->name('admin.pages.depoimento.index');
    Route::get('/admin/depoimento/create', [DepoimentoController::class, 'create'])->name('admin.pages.depoimento.create');
    Route::post('/admin/depoimento/store', [DepoimentoController::class, 'store'])->name('admin.pages.depoimento.store');
    Route::get('admin/depoimento/delete/{id}', [DepoimentoController::class, 'destroy'])->name('admin.pages.depoimento.destroy');

    //denuncias
    Route::get('/admin/denuncia', [DenunciaController::class, 'index'])->name('admin.pages.denuncia.index');
    //classificados
    Route::get('/admin/classificados', [ClassificadoController::class, 'index'])->name('admin.pages.classificados.index');

    //categorias classificados admin
    Route::get('/admin/classificados/categorias', [Categoriaclass::class, 'index'])->name('admin.pages.classificados.categoria.index');
    Route::post('/admin/classificados/categorias/store', [Categoriaclass::class, 'store'])->name('admin.pages.classificados.categoria.store');
    Route::delete('/admin/classificados/destroy/{id}', [Categoriaclass::class, 'destroy'])->name('admin.pages.classificados.categoria.destroy');

    //classificados cliente
    Route::get('admin/classificado', [ClassificadoController::class, 'index'])->name('admin.pages.cliente.classificado.index');
    Route::get('admin/classificado/create', [ClassificadoController::class, 'create'])->name('admin.pages.cliente.classificado.create');
    Route::post('admin/classificado/store', [ClassificadoController::class, 'store'])->name('admin.pages.classificado.store');
    Route::delete('admin/classificado/destroy{id}', [ClassificadoController::class, 'destroy'])->name('admin.pages.classificado.destroy');

    //classificados imagens cliente
    Route::get('admin/classificado/fotos/{id}', [ImageController::class, 'index'])->name('admin.pages.foto.create');
    Route::post('admin/classificado/fotos/store', [ImageController::class, 'store'])->name('admin.pages.foto.store');


});


require __DIR__ . '/auth.php';
