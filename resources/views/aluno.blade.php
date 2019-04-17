@extends('principal')

@section('cabecalho')
<div id="m_texto">
        <img src=" {{ url('/img/alunop_ico.png') }}" >
        &nbsp;Alunos Cadastrados
</div>
@stop

@section('conteudo')

    @if (old('cadastrar'))
        <div class="alert alert-success">
            <strong> {{ old('nome') }} </strong>: Cadastrado com Sucesso!
        </div>
    @endif

    @if (old('editar'))
        <div class="alert alert-success">
            <strong> {{ old('nome') }} </strong>: Alterado com Sucesso!
        </div>
    @endif

    <div class='row'>
        <div class='col-sm-8' style="text-align: center">
            <a  href="{{ action('AlunoController@cadastrar') }}" type="button" class="btn btn-primary btn-block">
                <b>Cadastrar Novo Aluno</b>
            </a>
        </div>

        <div class='col-sm-3' style="text-align: center">
            <input type="text" list="alunos" class="form-control" autocomplete="on" placeholder="Buscar">

            <datalist id="alunos">
                @foreach ($alunos as $dados)
                    <option value="{{ $dados->nome }}">
                @endforeach
            </datalist>
        </div>

        <div class='col-sm-1' style="text-align: center">
            <button type="button" class="btn btn-default btn-block">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
    </div>

    <br>

    <table class='table table-striped'>
        <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>CURSO</th>
            <th>TURMA</th>
            <th>FREQ.</th>
            <th>EVENTOS</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($alunos as $dados)
            <tr>
                <td>{{ $dados->id }}</td>
                <td>{{ $dados->nome }}</td>
                <td>{{ $dados->curso }}</td>
                <td>{{ $dados->turma }}</td>
                <td>{{ $dados->frequencia }}%</td>

                <td>
                    <a href="{{ action('AlunoController@editar', ['id' => $dados->id]) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                    &nbsp;
                    <a href="{{ action('AlunoController@remover', ['id' => $dados->id]) }}"><span class='glyphicon glyphicon-remove'></span></a>
                </td>
        @endforeach
        </tbody>
    </table>


@stop
