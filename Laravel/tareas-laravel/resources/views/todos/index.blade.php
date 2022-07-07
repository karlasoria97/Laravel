@extends('app')

@section('content')    

    <div class="container w-25 border p-4 mt-4">
        <div class="row mx-auto">
            <form action="{{ route('todos') }}" method="POST">
                @csrf
                <div class="mb-3">
    
                    @error('title')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror
    
                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success')}}</h6>  
                    @endif
               
                    <label for="title" class="form-label">Titulo de las tareas</label>
                    <input type="text" name="title" class="form-control">
    
                    <label for="category_id" class="form-label">Categoria de la tarea</label>
                    <select name="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
    
                    <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
                </div>
            </form>
            <div>
                @foreach ($todos as $todo)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ route('todos-show', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                        </div>
                        <div class="col-med-3 d-flex justify-content-end">
                            <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
        </div>
        </div>
    </div>
@endsection