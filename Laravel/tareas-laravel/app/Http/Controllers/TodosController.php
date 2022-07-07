<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodosController extends Controller
{
    /**
     * index sirve para mostar todos los "todos"
     * store para guardad
     * update para actualizar
     * distroy para eliminar
     * edir para mostrar el formulario de edición
     */

    public function index(){

      $todos = Todo::all();
      $categories = Category::all();

      return view('todos.index', ['todos' => $todos, 'categories' => $categories]);
   }

     public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3'

        ]);

        $todo = new Todo;

        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
     }

     public function show($id){

        $todo = Todo::find($id);
        $categories = Category::all();

        return view('todos.show', ['todo' => $todo, 'categories' => $categories]);
     }

     public function update(Request $request, $id){

        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea actualizada correctamente');
     }

     public function destroy($id){

        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('todos')->with('success', 'Tarea eliminada correctamente');
     }
}
