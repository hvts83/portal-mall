@extends('layouts.app')

@section('css')
<link href="{{ asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('content')

@php use Carbon\Carbon; @endphp

<div class="container">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <form role="form" method="post" action="{{ url('/banner/send') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <legend>Imagenes de publicidad</legend>
                                <div class="col-md-12">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                            </div>
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Seleccionar</span>
                                                <span class="fileinput-exists">Cambiar</span>
                                                <input type="file" name="publicity"/>
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagen</th>
                                    <th>Fecha de subida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                <tr class="gradeX">
                                    <td>{{ $banner->id }}</td>
                                    <td><img src='{{ $banner->url}}' class="img-lg" /></td>
                                    <td class="center">{{ $banner->created_at }} </td>
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
                dom: '<"html5buttons"B>lTfgitp',
                pageLength: 25,
                buttons: [
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
