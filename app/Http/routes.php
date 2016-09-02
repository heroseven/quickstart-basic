<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;
use App\User;



// crear token y almacenar token

Route::get('tarjeta', function(){
     return View('pagos.tarjeta');
    
});
Route::post('tarjeta', function(Request $request){
        
     //r7Onv8G2VthgeYwBTMpnEz0e1dOBZ1rq
     //nuevo token creado
     $usuario=User::find('1');
     $usuario->token=$request->input('token');

     
     
     //Session::put(Request::input('token'));
     if($usuario->save()){
         return 'ok';
     }else{
        return 'bad';
     }

    // Configurar credencial (API Key)
    $SECRET_API_KEY = "Ad12344hyhfgX";

// Autenticación
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));


});
//crear cargo



Route::get('foo', function(){
     return View('tarjeta');
    
});

//crear 3 planes



Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/jjj', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });
});
