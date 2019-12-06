<!DOCTYPE html>
@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <title> Inicio </title>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body" >
                <div class="container">

                    <!-- Page Heading -->
                    <h1 class="my-4" style="text-align: center">Lista de categorías </small></h1>
                    <!-- Page Heading -->
                    <hr style="border-top: 3px solid rgba(0, 0, 0, 0.3);">
                    <div class="row">
                        @if ($academico->categoria)
                                          <a class="btn btn-default button" href="categorias/{{$academico->categoria->id}}">{{$academico->categoria->nombre}}</a>
                        @endif
                        @foreach ($categorias as $categoria)
                            @if ($academico->categoria != $categoria)
                                                <a class="btn btn-default button" href="categorias/{{$categoria->id}}">{{$categoria->nombre}}</a>
                            @endif
                        @endforeach
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.container -->
            </div>
        </div>
        <div style="height: 100px"></div>
            <p class="lead mb-0"></p>
        </div>
    </div>
@endsection
