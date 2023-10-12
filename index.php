
<?php
//criando cabelho para quem que ter acesso na api

header("Access-Control-Allow-Origin: *");
//formatos qye quero receber
header("Content-Type: application/json; charset-UTF-8");
//inculuido conexão
include_once 'connect.php';

if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];

    // Escolhe a consulta com base no tipo
    switch ($tipo) {
        case 'pacientes':
            $query = "SELECT id, nome, idade, genero, historico, objetivo, statusSaude, email, telefone, senha FROM pacientes ORDER BY id DESC";
            break;

        case 'medico':
            $query = "SELECT id, nome, especializacao, email, telefone, senha FROM medico ORDER BY id DESC";
            break;

        case 'receita':
             $query = "SELECT id, descricao, data, id_paciente, id_medico FROM receita ORDER BY id DESC";
             break;
        default:
            // Tipo inválido, retorna uma mensagem de erro
            http_response_code(400);
            echo json_encode(array("message" => "Tipo inválido."));
            exit();
        }
   

     // Executa a consulta
     $result = $conn->prepare($query);
     $result->execute();
 
     // Verifica e processa os resultados
     if ($result && $result->rowCount() != 0) {
         while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
             $lista["records"][$row['id']] = $row;
         }
 
         // Retorna os resultados em formato JSON
         http_response_code(200);
         echo json_encode($lista);
     } else {
         // Tratamento para nenhum resultado encontrado
         http_response_code(404);
         echo json_encode(array("message" => "Nenhum resultado encontrado."));
     }
 } else {
     // Parâmetro 'tipo' não fornecido, retorna uma mensagem de erro
     http_response_code(400);
     echo json_encode(array("message" => "Parâmetro 'tipo' não fornecido."));
 }

?>
