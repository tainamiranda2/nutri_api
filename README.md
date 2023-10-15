# Nutri Api 
## A Nutri API é uma interface de programação de aplicativos (API) que fornece acesso a recursos relacionados a pacientes, médicos e receitas. Ela permite a atualização de informações dessas entidades por meio de requisições HTTP, oferecendo operações básicas como criar, recuperar, atualizar e excluir dados.

### Obs: no momento, apenas pacientes possuem todas as funcionalidades implementadas.

## Endpoints: GET, PUT, DELETE, POST

 `http://localhost/sua_api/update.php`

 ## Requisisão POST

  `{
    "tipo_entidade": "paciente",
    "id": 1,
    "entidade": {
        "nome": "Novo Nome",
        "idade": 30,
        "genero": "Masculino",
        "historico": "Novo histórico",
        "objetivo": "Novo objetivo",
        "statusSaude": "Bom",
        "email": "novoemail@example.com",
        "telefone": "123456789",
        "senha": "novasenha"
    }
}
`
## Resposta de sucesso
`{
    "erro": false,
    "mensagem": "Paciente atualizado com sucesso."
}
`
## Resposta de erro

`{
    "erro": true,
    "mensagem": "Falha ao atualizar paciente."
}
`