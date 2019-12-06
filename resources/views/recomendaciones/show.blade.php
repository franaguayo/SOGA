@extends('layouts.app')
@section('content')
    <title> {{$recomendacion->nombre}} </title>
    <div class="container">
        
        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h1>Recomendación: {{$recomendacion->nombre}}</h1>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h6>Esta recomendación pertenece a la categoría: {{$recomendacion->categoria->nombre}}</h6>
            </div>
        </div>
        @if (auth()->user()->privilegio == 1) 
            <a style="float:right; color:white !important;" class="btn btn-success btn-md" href="{{ route('recomendacion.reporte', $recomendacion->id) }}">
                <span class="fa fa-download"></span> 
                Generar reporte
            </a>
        @endif
        <br>
        <hr>

        <div class="row text-center">
            <div class="col-lg-12 col-md-12">
                <h3>Descripción</h3>
                <p class="descripcion-texto">{{$recomendacion->descripcion}}</p>
            </div>
        </div>
        <br>

        @if (count($planes)>0)
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Plan</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        @if($recomendacion->categoria->academico_id == auth()->user()->id)
                            <th scope="col">Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($planes as $plan)
                        <tr>
                            <td><a  href="/plan/{{$plan->id}}" >{{$plan->nombre}}</a></td>
                            @if ( $plan->completado == 1)
                                <td>Completado.</td>
                            @else
                                <td>En progreso.</td>
                            @endif                            
                            <td>{{$plan->fecha_termino}}</td>
                            @if($recomendacion->categoria->academico_id == auth()->user()->id)
                            <td>
                                <div class="container">
                                    <br>
                                    <div class="row">                                                                
                                        <div class="col-sm-6 text-center">
                                            <form action="{{ route('plan.destroy',$plan->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Quiere borrar el plan de acción: {{ $plan->nombre }}?')" >
                                                            Borrar <span class="fa fa-trash"></span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-sm-6 text-center">
                                            <a style="color:white !important;" class="btn btn-info btn-sm" href="/plan/{{$plan->id}}/edit">Editar <span class="fa fa-pencil"></span></a> 
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay planes para esta recommendación.</p>
        @endif

        <br>

        @if (auth()->user()->privilegio == 1) 
            <div class="row">
                <div class="col-lg-12"> 
                    <center>
                        <form action="{{ route('recomendacion.destroy',$recomendacion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Quiere borrar la recomendación: {{ $recomendacion->nombre }}?')" >
                                Borrar recomendación <span class="fa fa-trash"></span>
                            </button>
                            <a style="color:white !important;" class="btn btn-info btn-sm" href="/recomendacion/{{$recomendacion->id}}/edit">Editar recomendación <span class="fa fa-pencil"></span></a>
                        </form>
                        
                    </center>  
                </div>
            </div>
        @endif
        @if(auth()->user()->categoria != null)
            @if(auth()->user()->categoria->id == $recomendacion->categoria->id)
                <center>
                    <form action="{{ route('plan.create')}}">
                            <input type='hidden' value='{{$recomendacion->id}}' name='rec_id'/><br>
                            <input type='submit' class="btn btn-secondary" value='Agregar plan de acción'/>
                    </form>
                </center>
            @endif
        @endif
    </div>
    <div style="height: 100px"></div>
        <p class="lead mb-0"></p>
    </div>
@endsection