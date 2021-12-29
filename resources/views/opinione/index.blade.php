@extends('layouts.app')

@section('template_title')
    Opinione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Opiniones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('opiniones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva opinión') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr align="center">
                                        <th>No</th>
                                        
										<th>Opinion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($opiniones as $opinione)
                                        <tr align="center">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $opinione->opinion }}</td>

                                            <td align="right">
                                                <form action="{{ route('opiniones.destroy',$opinione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('opiniones.show',$opinione->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('opiniones.edit',$opinione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $opiniones->links() !!}
            </div>
        </div>
    </div>
@endsection
