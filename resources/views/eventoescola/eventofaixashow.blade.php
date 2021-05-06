@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Administrar faixas eventos')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Administrar faixas eventos</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('eventoescola.list') }}">Lista eventos da escola</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Administrar faixas eventos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <div class="table-responsive">
            <?php
            $AcessoCadM = app(\App\Http\Controllers\EventoEscolaController::class)->permissaoAcessoPontoManual(app('request'));
            $AcessoCadArq = app(\App\Http\Controllers\EventoEscolaController::class)->permissaoAcessoPontoArquivo(app('request'));
            $AcessoCadA = app(\App\Http\Controllers\EventoEscolaController::class)->permissaoAcessoA(app('request'));
            ?>
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Evento</th>
                    @foreach ( $AcessoCadA as $AcessoCadAItem )
                        @if($AcessoCadAItem->Tela)
                            <th>Faixas</th>
                        @endif
                    @endforeach
                    @foreach ( $AcessoCadArq as $AcessoCadArqItem )
                        @if($AcessoCadArqItem->Tela)
                            <th>Repasse de Pontos - Arquivo</th>
                        @endif
                    @endforeach
                    @foreach ( $AcessoCadM as $AcessoCadMItem )
                        @if($AcessoCadMItem->Tela)
                            <th>Repasse de Pontos - Manual</th>
                        @endif
                    @endforeach
                </tr>
                </thead>
                <tbody>
                    @if(count($EventoEscolas)>0)
                        @foreach ( $EventoEscolas as $eventoescola )
                            <tr>
                                <td>{{ $eventoescola->Escola }}</td>
                                <td>{{ $eventoescola->Evento }}</td>
                                @foreach ( $AcessoCadA as $AcessoCadAItem )
                                    @if($AcessoCadAItem->Tela)
                                        <td>
                                            <a href="{{ url('eventoescola/eventofaixa/faixaslist/'.$eventoescola->EventoEscolaID).'/1' }}">Administrar</a>
                                        </td>
                                    @endif
                                @endforeach
                                @foreach ( $AcessoCadArq as $AcessoCadArqItem )
                                    @if($AcessoCadArqItem->Tela)
                                        <td>
                                            <a href="{{ url('eventoescola/eventofaixa/faixaslist/'.$eventoescola->EventoEscolaID).'/2' }}">Importar</a>
                                        </td>
                                    @endif
                                @endforeach
                                @foreach ( $AcessoCadM as $AcessoCadMItem )
                                    @if($AcessoCadMItem->Tela)
                                        <td>
                                            <a href="{{ url('eventoescola/eventofaixa/RepasseForm/'.$eventoescola->EventoEscolaID).'/3' }}">Repassar</a>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="5">Nenhum Evento Escola Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
@endsection
@section('script')
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
    </script> 
@endsection
