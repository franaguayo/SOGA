{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Categorias</title>
</head>
<style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        </style>
<body>

    <h1>Lista de categorías</h1>
    <form action="/categorias/create">
        <input type="submit" value="Crear categoria" />
    </form>
    @if($categorias->count() > 0)
        <table style="width:50%">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th> 
                <th>Acciones</th>
            </tr>
            
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>
                    <td>
                        <div style="float: right">
                            <a class="btn btn-info btn-sm" href="/categorias/{{$categoria->id}}/edit">Editar</a> --}}
                            {{-- <a class="btn btn-info btn-sm" href="/categorias/create/{{$categoria->id}}">Agregar publicación.</a> --}}
                            {{-- <a class="btn btn-info btn-sm" href="{{route('categorias.show',$categoria->id)}}">Produccion academica</a> --}}
                            {{-- <form style="float:left" action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quiere borrar la categoria: {{ $categoria->nombre }}?')" >Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </table>
       
    @else 
        <p>No hay categorías registradas.</p>
    @endif
    
</body>
</html> --}}
<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .center-column {
        display: block;
        margin: auto;
    }
</style>
<title>Listado de categorías</title>
     <!-- Page Content -->

<div class="container">
    <h1 class="text-center">Listado de categorías</h1>
    <br>               
    @if($categorias->count() > 0)
        <table class="table table-hover"  >
            <thead class="thead-dark">
                <tr>
                    <th style="min-width: 1%;">Nombre</th>
                    <th>Descripción</th>
                    <th style="width: 14%;">Acciones</th>
                </tr>
            </thead>
        @foreach ($categorias as $categoria)
            <tr>
                <td><a style="color:black !important;" href="{{route('categorias.show',$categoria->id)}}">{{$categoria->nombre}}</a></td>
                <td style="height:10px;"><p class="descripcion-texto">{{$categoria->descripcion}}</p></td>
                <td>
                    <div class="container">
                        <br>
                        <div class="row">                                
                        
                            <div class="col-lg-6 text-center">
                                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Quiere borrar la categoria: {{ $categoria->nombre }}?')" >
                                                Borrar <span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            </div>

                            <div class="col-lg-6 text-center">
                                <a style="color:white !important;" class="btn btn-info btn-sm" href="/categorias/{{$categoria->id}}/edit">Editar <span class="fa fa-pencil"></span></a> 
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </table>
            
    @else 
        <p>No hay categorías registradas.</p>
    @endif      
    
    <br>
    <form action="/categorias/create">
        {{-- <button type="submit" style="float: right; background-color:grey" class="btn pretty-btn"  type="submit" value="">Crear categoría</button> --}}
        <input style="float: right; background-color:grey; color:white" class="btn pretty-btn"  type="submit" value="Crear categoría" />
    </form><br>     
    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>
</div> 

@endsection