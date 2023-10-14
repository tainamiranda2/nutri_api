<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");
header("Access-Control-Allow-Headers: *");

include_once 'connect.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);

if ($dados) {
    $tipo_entidade = $dados['tipo_entidade'];

    switch ($tipo_entidade) {
        case 'paciente':
            cadastrarPaciente($dados['entidade']);
            break;
        case 'medico':
            cadastrarMedico($dados['entidade']);
            break;
        case 'receita':
            cadastrarReceita($dados['entidade']);
            break;
        default:
            $response = [
                "erro" => true,
                "mensagem" => "Tipo de entidade inválido."
            ];
            break;
    }
} else {
    $response = [
        "erro" => true,
        "mensagem" => "Dados inválidos."
    ];
}

http_response_code(200);
echo json_encode($response);

function cadastrarPaciente($paciente)
{
    global $conn;

    $query = "INSERT INTO pacientes (nome, idade, genero, historico, objetivo, statusSaude, email, telefone, senha) 
              VALUES (:nome, :idade, :genero, :historico, :objetivo, :statusSaude, :email, :telefone, :senha)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nome', $paciente['nome']);
    $stmt->bindParam(':idade', $paciente['idade']);
    $stmt->bindParam(':genero', $paciente['genero']);
    $stmt->bindParam(':historico', $paciente['historico']);
    $stmt->bindParam(':objetivo', $paciente['objetivo']);
    $stmt->bindParam(':statusSaude', $paciente['statusSaude']);
    $stmt->bindParam(':email', $paciente['email']);
    $stmt->bindParam(':telefone', $paciente['telefone']);
    $stmt->bindParam(':senha', $paciente['senha']);
    
    $stmt->execute();
    
    if ($stmt->rowCount()) {
        $response = [
            "erro" => false,
            "mensagem" => "Paciente cadastrado."
        ];
    } else {
        $response = [
            "erro" => true,
            "mensagem" => "Falha ao cadastrar paciente."
        ];
    }
    http_response_code(200);
echo json_encode($response);
}

function cadastrarMedico($medico)
{
    global $conn;

    $query = "INSERT INTO medico (nome, especializacao, email, telefone, senha) 
              VALUES (:nome, :especializacao, :email, :telefone, :senha)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nome', $medico['nome']);
    $stmt->bindParam(':especializacao', $medico['especializacao']);
    $stmt->bindParam(':email', $medico['email']);
    $stmt->bindParam(':telefone', $medico['telefone']);
    $stmt->bindParam(':senha', $medico['senha']);
   
    $stmt->execute();
    
    if ($stmt->rowCount()) {
        $response = [
            "erro" => false,
            "mensagem" => "Médico cadastrado."
        ];
    } else {
        $response = [
            "erro" => true,
            "mensagem" => "Falha ao cadastrar medico."
        ];
    }
    http_response_code(200);
echo json_encode($response);
}

function cadastrarReceita($receita)
{
    global $conn;

    // Lógica para cadastrar receita
    $query = "INSERT INTO receita (descricao, data, id_paciente, id_medico) 
    VALUES (:descricao, :data, :id_paciente, :id_medico)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':descricao', $receita['descricao']);
$stmt->bindParam(':data', $receita['data']);
$stmt->bindParam(':id_paciente', $receita['id_paciente']);
$stmt->bindParam(':id_medico', $receita['id_medico']);
$stmt->execute();
    
if ($stmt->rowCount()) {
    $response = [
        "erro" => false,
        "mensagem" => "Receita cadastrado."
    ];
} else {
    $response = [
        "erro" => true,
        "mensagem" => "Falha ao cadastrar receita."
    ];
}
http_response_code(200);
echo json_encode($response);
}
?>
