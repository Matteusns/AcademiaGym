<?php
include_once("../config.php");

if(isset($_POST["nome"])) {
    gravaDadosAlunos($conexao);
}

$linhasTabela = getAlunos($conexao);;

$conexao->close();

function gravaDadosAlunos($conexao) {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $dataCadastro =  date("Y-m-d");

    $result = mysqli_query($conexao,"INSERT INTO Alunos (nome, telefone, email, dataCadastro)
    VALUES('$nome', '$telefone', '$email', '$dataCadastro')");

    if ($result) {
        header("Location: aluno.php");
    }
}

function getAlunos($conexao) {

    $sql = "SELECT * FROM Alunos";
    $result = mysqli_query($conexao, $sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrAlunos[] = $row;
        }
    }
    return populaTabela($arrAlunos);
}

function populaTabela ($arrAlunos) {
    $linhas = "";
    if (count($arrAlunos) > 0) {
        foreach ($arrAlunos as $row) {
            $linhas .= "<tr>";
            $linhas .= "<td class='col-acao'>";
            $linhas .= '<button type="button" class="btn btn-primary btn-editar mr-2" data-id="'. $row["id"] .'"><i class="fas fa-pencil"></i> Editar</button>';
            $linhas .= '<button type="button" class="btn btn-danger"><i class="fas fa-trash" data-id="'. $row["id"] .'"></i> Inativar</button>';
            $linhas .= "</td>";
            $linhas .= "<td>" . $row["nome"] . "</td>";
            $linhas .= "<td>" . $row["telefone"] . "</td>";
            $linhas .= "<td>" . $row["email"] . "</td>";
            $linhas .= "<td>" . $row["dataCadastro"] . "</td>";
            $linhas .= "</tr>";
        }

    } else{
        $linhas = "<td colspan='5' class='semResultado' text='center'>0 Cadastros</td>";
    }
    
    return $linhas;
}
