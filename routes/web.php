<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Rotas 

Route::get('/contact', function(){
    return view('contact.contact');
});

Route::get('/about', function(){
    return 'About Page';
});

Route::get('/empresa', function(){
    return 'Empresa';
});
Route::get('/', function () {
    return view('welcome');
});


//Rotas any & match
/**
 * Rotas any aceita todos os tipos de verbos 
 * GET, POST,PUT, PATCH, DELETE, OPITIONS
 */


  Route::any('/any', function(){
      return 'Route type Any';
  });

//Rotas match
 /**
  * Rotas do tipo match não muito diferen das rota do tipo any
  * recebe com paramentro um conjunto de verbos ex:
  * Route::match(['get','post'], 'match', function(){})
  */
  Route::match(['get', 'post'], '/match', function(){
      return 'Route Type Match';
  });

  //Rotas com Parâmentros

  /**
   * Parâmentos Obrigatorio
   */
  Route::get('/categoria/{nomeDaCategoria}', function($nomeDaCategoria){
      return "Produtos da Categoria: {$nomeDaCategoria}";
  });

  Route::get('/fotos/{nomeDaPublicacao}/publicacao', function($nomeDaPublicacao){
      return "Fotos da Publicação: {$nomeDaPublicacao}";
  });

  /**
   * Parâmentos não obrigatorio
   */

   Route::get('/produto/{nome?}', function($nome = ''){
       return "Produto(s) {$nome}";
   });

   //Redirect 

   /** Redirecionamento Usando Helper REDIRECT */
   Route::redirect('/', '/about');

   Route::get('/redirect1', function(){
       return redirect('/redietect2');
   });

   Route::get('/redietect2', function(){
       return 'Rota de Redirecionameto 2';
   });

   /**Retornando um view usando o Helper VIEW */
   Route::view('/redietect2', 'welcome');

   //Rotas nomeadas

   Route::get('/redirect3', function(){
        return 'Redirect 3';

   })->name('redirect.name');

   Route::get('/redirect4', function(){
       return redirect()->route('redirect.name');
   });

   //Grupo de Rotas

   /** Rotas Base */

  

   /** Group Middleware */
   Route::middleware('auth')->group(function(){

        Route::get('/admin/dashboard', function(){
            return 'Dashboard';
        });
        Route::get('/admin/produtos', function(){
            return 'Produtos';
        });
        Route::get('/admin/financeiro', function(){
            return 'financeiro';
        });
   });

    /** Group Prefix */
    Route::prefix('admin')->group(function(){

        Route::get('/dashboard', function(){
            return 'Dashboard';
        });
        Route::get('/produtos', function(){
            return 'Produtos';
        });
        Route::get('/financeiro', function(){
            return 'financeiro';
        });
    }); 
    
    /** Usando Group com Paramentos*/
    Route::group(
        [
            'middleware' => ['auth'],
            'prefix' => 'admin'
        ], 
        function() {
            Route::get('/dashboard', function(){
                return 'Dashboard';
            });
            Route::get('/produtos', function(){
                return 'Produtos';
            });
            Route::get('/financeiro', function(){
                return 'financeiro';
            });
    });

    // INICIANDO OS ESTUDO SOBRE CONTROLLER
    
    Route::get('products', [ProductsController::class, 'index'])->name('products.index');

    // PASSANDO PARAMENTROS PARA O CONTROLADOR
    Route::get('products/{id}', [ProductsController::class, 'show'])->name('products.show');

    //ESTRUTURA DE ROTAS DE UM CRUD BASICO
    Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::get('products/{id}/edit', [ProductsController::class, 'edit'])->name('prodcuts.edit');
    Route::put('products/{id}', [ProductsController::class, 'update'])->name('producuts.update');
    Route::post('products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('products/{id}/destroy', [ProductsController::class, 'destroy'])->name('products.destroy');


    //TRBALHAMDO COM RESOURCE EM LARAVE

    Route::resource('/user', UserController::class);
    Route::resource('/photo', PhotoContoller::class);

   /** Rota Auxuliar para fazer o teste */
   Route::get('/login', function(){
       return 'Login';

   })->name('login');

