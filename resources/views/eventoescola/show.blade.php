@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Lista eventos da escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista eventos da escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <strong>Lista eventos da escola</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
            @csrf
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Eventos</th>
                    <th>Faixas de Eventos / Repasse de Pontos</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($EventoEscolas)>0)
                        @foreach ( $EventoEscolas as $eventoescola )
                            <tr>
                                <td>{{ $eventoescola->Escola }}</td>
                                <td>
                                    <a href="{{ url('eventoescola/editar/'.$eventoescola->EscolaID) }}">Alterar</a>
                                </td>
                                <td>
                                    <a href="{{ url('eventoescola/eventofaixa/'.$eventoescola->EscolaID) }}">Alterar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="4">Nenhum Evento Escola Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
            <div class="form-group">
                <form role="form" method="get" action="{{action('EventoEscolaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>

    <script src="{{ url('js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('js/inspinia.js') }}"></script>
    <script src="{{ url('js/plugins/pace/pace.min.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>

        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },
                
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'EventoEscolas'},
                    {extend: 'pdf', title: 'EventoEscolas'},

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

        $(".campoCNPJ").mask("99.999.999/9999-99");
    </script> 
@endsection