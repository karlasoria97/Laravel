@extends('app')

@section('content')    
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todos-update', ['id' => $todo->id]) }}" method="POST">
            @method('PATCH')
            @csrf

            <div class="mb-3 col">

                @error('title')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success')}}</h6>  
                @endif

                <label for="title" class="form-label">Titulo de las tareas</label>
                <input type="text" name="title" class="form-control" value="{{ $todo->title }}">

                <label for="category_id" class="form-label">Categoria de la tarea</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Actualizar tarea</button>
            </div>            
        </form>
    </div>
@endsection