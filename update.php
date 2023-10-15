<?php
// Criando cabeçalho para permitir acesso à API
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

include_once 'connect.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);

if ($dados) {
    // Query para atualizar paciente
    $query_paciente = "UPDATE pacientes SET nome=:nome, idade=:idade, genero=:genero, historico=:historico, objetivo=:objetivo, statusSaude=:statusSaude, email=:email, telefone=:telefone, senha=:senha WHERE id=:id";

    // Preparando a consulta
    $edit_paciente = $conn->prepare($query_paciente);

    // Substituindo parâmetros
    $edit_paciente->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $edit_paciente->bindParam(':idade', $dados['idade'], PDO::PARAM_INT);
    $edit_paciente->bindParam(':genero', $dados['genero'], PDO::PARAM_STR);
    $edit_paciente->bindParam(':historico', $dados['historico'], PDO::PARAM_STR);
    $edit_paciente->bindParam(':objetivo', $dados['objetivo'], PDO::PARAM_STR);
    $edit_paciente->bindParam(':statusSaude', $dados['statusSaude'], PDO::PARAM_STR);
    $edit_paciente->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $edit_paciente->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
    $edit_paciente->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
    $edit_paciente->bindParam(':id', $dados['id'], PDO::PARAM_INT);

    // Executando a consulta
    $edit_paciente->execute();

    // Verificando o resultado
    if ($edit_paciente->rowCount()) {
        $response = [
            "erro" => false,
            "mensagem" => "Paciente atualizado com sucesso"
        ];
    } else {
        $response = [
            "erro" => true,
            "mensagem" => "Falha ao atualizar paciente"
        ];
    }
} else {
    $response = [
        "erro" => true,
        "mensagem" => "Dados inválidos"
    ];
}

// Respondendo com o resultado em formato JSON
http_response_code(200);
echo json_encode($response);
?>
