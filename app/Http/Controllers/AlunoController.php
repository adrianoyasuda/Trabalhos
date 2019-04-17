<?php

namespace App\Http\Controllers;
use App\Aluno;
use Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller {

    public function listar() {

        $alunos = DB::select('SELECT * FROM tb_alunos order by nome');
        return view('aluno')->with('alunos', $alunos);
    }

    public function cadastrar() {

        $alunos = DB::select('SELECT * FROM tb_alunos');
        $cursos = DB::select('SELECT * FROM curso_models');
        return view('alunoCadastrar')->with('alunos', $alunos)->with('cursos', $cursos);
    }

    public function salvar($id) {

        // INSERT
        if($id == 0) {
            $objAluno = new Aluno();
            $objAluno->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objAluno->curso = mb_strtoupper(Request::input('curso'), 'UTF-8');
            $objAluno->turma = mb_strtoupper(Request::input('turma'), 'UTF-8');

            $objAluno->save();
        }
        // UPDATE
        else {
            /*$objAluno = Aluno::find($id);
            $objAluno->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objAluno->ano = Request::input('ano');
            // Obtém Id Curso
            $arr = explode(" ", Request::input('curso'));
            $objAluno->id_curso = $arr[0];
            // Fim
            // Obtém Ativo/Inativo
            $ativo = Request::input('ativo');
            if (strcmp($ativo, "ATIVO") == 0) { $objAluno->ativo = 1; }
            else { $objAluno->ativo = 0; }

            $objAluno->save();*/
        }

        return redirect()->action('AlunoController@listar')->withInput();
    }
}

