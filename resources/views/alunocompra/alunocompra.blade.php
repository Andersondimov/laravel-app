@extends('layout.layout')

@section('title', 'Compra')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Compra</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('alunocompra.list') }}">Lista compra</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Compra</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
            <form role="form" method="post" action="{{action('AlunoCompraController@store')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="widget style1 lazur-bg">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-8 text-right">
                                    <span> Aluno </span>
                                    <h2 class="font-bold">André Dimov</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 text-center">
                        <div class="widget style1 navy-bg">
                            <i class="fa fa-caret-square-o-right fa-5x"></i>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="widget style1 yellow-bg">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-8 text-right">
                                    <span> Escola </span>
                                    <h2 class="font-bold">CNA Itaquera</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationCustom01">Pontos</label>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-danger m-r-sm">05</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">10</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">15</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">20</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">25</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-default m-r-sm">30</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">35</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger m-r-sm">40</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">45</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">50</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">55</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">60</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-danger m-r-sm">65</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">70</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-default m-r-sm">75</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">80</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">85</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">90</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">95</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">100</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
@endsection