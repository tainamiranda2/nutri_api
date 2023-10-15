<?php

//Cabecalhos obrigatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

//Incluir a conexao
include_once 'connect.php';

//$id = 3;
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$response = "";

$query_paciente = "SELECT id, nome, idade, genero, historico, objetivo, statusSaude, email, telefone, senha FROM pacientes WHERE id=:id LIMIT 1";
$result_paciente = $conn->prepare($query_paciente);
$result_paciente->bindParam(':id', $id, PDO::PARAM_INT);
$result_paciente->execute();

if(($result_paciente) AND ($result_paciente->rowCount() != 0)){
    $row_paciente = $result_paciente->fetch(PDO::FETCH_ASSOC);
    extract($row_paciente);

    $paciente = [
        'id' => $id,  
        'nome'=> $nome,
         'idade'=> $idade,
          'genero'=> $genero,
           'historico'=> $historico, 
           'objetivo'=> $objetivo, 
           'statusSaude'=> $statusSaude, 
           'email'=> $email,
            'telefone'=> $telefone,
             'senha'=> $senha
    ];

    $response = [
        "erro"=> false,
        "paciente" => $paciente
    ];
}else{
    $response = [
        "erro"=> true,
        "messagem" => "paciente não encontrado!"
    ];
}
http_response_code(200);
echo json_encode($response);
