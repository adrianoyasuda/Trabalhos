@extends('principal')

@section('cabecalho')
    <div>
        <a href="/aluno">
            <img src=" {{ url('/img/alunop_ico.png') }}" >
        </a>
        &nbsp;Cadastrar Novo Aluno
    </div>
@stop

@section('conteudo')


    <form action="{{ action('AlunoController@salvar', ['id' => 0]) }}" method="POST">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type ="hidden" name="cadastrar" value="C">

        <div class="row">
            <div class="col-sm-12">
                <label>Nome: </label>
                <input type="text" name="nome" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label>Curso: </label>
                <select name="curso" class="form-control">
                    <option disabled="true" selected="true"> </option>
                    @foreach ($cursos as $dados)
                        <option> {{ $dados->nome }} ({{ $dados->abreviatura }}) </option>
                    @endforeach
                </select>
            </div>

        </div>
        <br>
        <button type="submit" class="btn btn-success btn-block">Salvar</button>
    </form>
@stop
