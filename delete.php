<?php

//Cabecalhos obrigatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

//Incluir a conexao
include_once 'connect.php';


$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$response = "";

$query_paciente = "DELETE FROM pacientes WHERE id=:id LIMIT 1";
$delete_paciente = $conn->prepare($query_paciente);
$delete_paciente->bindParam(':id', $id, PDO::PARAM_INT);

if($delete_paciente->execute()){
    $response = [
        "erro" => false,
        "mensagem" => "paciente apagado com sucesso!"
    ];
}else{
    $response = [
        "erro" => true,
        "mensagem" => "Erro: paciente não apagado com sucesso!"
    ];
}

http_response_code(200);
echo json_encode($response);