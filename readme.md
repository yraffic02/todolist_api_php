# API CRUD do "To-Do List"

A API CRUD do "To-Do List" permite realizar operações básicas (Criar, Ler, Atualizar e Excluir) em tarefas, com os campos "title" e "description". Esta API foi desenvolvida em PHP e segue o padrão REST.

## Requisitos

- PHP >= 7.0
- Servidor web (por exemplo, Apache)

## Configuração

1. Clone este repositório para o seu servidor web.
2. Configure a conexão com o banco de dados no arquivo `db.php`.
3. Inicie seu servidor web.

## Base URL

http://localhost/tasks


## Rotas

GET /

### Listar todas as tarefas

Status: 200 OK
Content-Type: application/json

[
    {
        "id": 1,
        "title": "Tarefa 1",
        "description": "Descrição da Tarefa 1"
    },
    {
        "id": 2,
        "title": "Tarefa 2",
        "description": "Descrição da Tarefa 2"
    }
]


POST /

Content-Type: application/json

{
    "title": "Título da tarefa",
    "description": "Descrição da tarefa"
}

Exemplo de resposta (sucesso)
Status: 200 OK
Content-Type: application/json

{
    "message": "Tarefa criada com sucesso!"
}

Exemplo de resposta (erro)
Status: 400 Bad Request
Content-Type: application/json

{
    "error": "Erro ao criar a tarefa: <mensagem de erro>"
}

PUT /

Content-Type: application/json

{
    "id": 1,
    "title": "Novo título da tarefa",
    "description": "Nova descrição da tarefa"
}


Exemplo de resposta (sucesso)
Status: 200 OK
Content-Type: application/json

{
    "message": "Tarefa atualizada com sucesso!"
}


Exemplo de resposta (erro)
Status: 400 Bad Request
Content-Type: application/json

{
    "error": "Erro ao atualizar a tarefa: <mensagem de erro>"
}

DELETE /?id=<ID>

Exemplo de resposta (sucesso)
Status: 200 OK
Content-Type: application/json

{
    "message": "Tarefa excluída com sucesso!"
}

Exemplo de resposta (erro)
Status: 400 Bad Request
Content-Type: application/json

{
    "error": "Erro ao excluir a tarefa: <mensagem de erro>"
}

Considerações Finais
Essa documentação descreve as principais funcionalidades da API CRUD do "To-Do List" em PHP. Use os exemplos fornecidos para entender como realizar solicitações corretamente e interpretar as respostas.


Este projeto está licenciado sob a [MIT License](LICENSE).
