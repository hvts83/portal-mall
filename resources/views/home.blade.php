@extends('layouts.app')

@section('css')
<link href="{{ asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Correo</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Sexo</th>
                                    <th>Interes en promocion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr class="gradeX">
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->email}}</td>
                                    <td>{{ $client->birthday}}</td>
                                    <td class="center">{{ $client->sexo}}</td>
                                    <td class="center">{{ $client->promocion== 1 ? "Activado": "No activado" }}</td>
                                </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.dataTables').DataTable({
                language: {
                    url: "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                pageLength: 25,
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Detalle'},
                    {extend: 'pdf', title: 'Detalle'},
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

         });
    });
</script>
@endsection
