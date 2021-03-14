@extends('layout.layout')

@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Lista Escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista Escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <strong>Lista Escola</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <th>Escola</th>
                            <th>Cod. Escola</th>
                            <th>Escola CNPJ</th>
                            <th>Rede</th>
                            <th>Status</th>
                            <th>Atualizar</th>
                            <th>Parametros</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($Escolas)>0)
                        @foreach ( $Escolas as $escola )
                            <tr>
                                <td>{{ $escola->Escola }}</td>
                                <td>{{ $escola->EscolaCod }}</td>
                                <td class="campoCNPJ">{{ $escola->EscolaCNPJ }}</td>
                                <td>{{ $escola->Rede }}</td>
                                <td>
                                    @if($escola->EscolaStatus == 1)
                                        Ativo
                                    @elseif($escola->EscolaStatus == 2)
                                        Inativo
                                    @elseif($escola->EscolaStatus == 3)
                                        Bloqueado
                                    @else($escola->EscolaStatus == 4)
                                        Prospect
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('escola/editar/'.$escola->EscolaID) }}">Alterar</a>
                                </td>
                                <td>
                                    <a href="{{ url('escola/editarparams/'.$escola->EscolaID) }}">Parametros</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">Nenhuma Escola Cadastrada</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            </div>
            <div class="form-group">
                <form role="form" method="get" action="{{action('EscolaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
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
                    url: "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },
                
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Escolas'},
                    {extend: 'pdf', title: 'Escolas'},

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