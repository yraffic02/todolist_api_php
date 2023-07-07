Documentação da API CRUD do "To-Do List"
A API CRUD do "To-Do List" permite realizar operações básicas (Criar, Ler, Atualizar e Excluir) em tarefas, com os campos "title" e "description". Esta documentação descreve as rotas disponíveis e os formatos de solicitação e resposta utilizados.

Base URL
arduino
Copy code
http://localhost/tasks
Rotas
Listar todas as tarefas
sql
Copy code
GET /
Retorna uma lista de todas as tarefas cadastradas.

Exemplo de resposta
makefile
Copy code
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
Criar uma nova tarefa
Copy code
POST /
Cria uma nova tarefa com base nos dados fornecidos.

Formato de solicitação
css
Copy code
Content-Type: application/json

{
    "title": "Título da tarefa",
    "description": "Descrição da tarefa"
}
Exemplo de resposta (sucesso)
makefile
Copy code
Status: 200 OK
Content-Type: application/json

{
    "message": "Tarefa criada com sucesso!"
}
Exemplo de resposta (erro)
makefile
Copy code
Status: 400 Bad Request
Content-Type: application/json

{
    "error": "Erro ao criar a tarefa: <mensagem de erro>"
}
Atualizar uma tarefa existente
Copy code
PUT /
Atualiza os dados de uma tarefa existente com base no ID fornecido.

Formato de solicitação
css
Copy code
Content-Type: application/json

{
    "id": 1,
    "title": "Novo título da tarefa",
    "description": "Nova descrição da tarefa"
}
Exemplo de resposta (sucesso)
makefile
Copy code
Status: 200 OK
Content-Type: application/json

{
    "message": "Tarefa atualizada com sucesso!"
}
Exemplo de resposta (erro)
makefile
Copy code
Status: 400 Bad Request
Content-Type: application/json

{
    "error": "Erro ao atualizar a tarefa: <mensagem de erro>"
}
Excluir uma tarefa
bash
Copy code
DELETE /?id=<ID>
Exclui a tarefa com o ID fornecido.

Exemplo de resposta (sucesso)
makefile
Copy code
Status: 200 OK
Content-Type: application/json

{
    "message": "Tarefa excluída com sucesso!"
}
Exemplo de resposta (erro)
makefile
Copy code
Status: 400 Bad Request
Content-Type: application/json

{
    "error": "Erro ao excluir a tarefa: <mensagem de erro>"
}
Considerações Finais
Essa documentação descreve as principais funcionalidades da API CRUD do "To-Do List" em PHP. Use os exemplos fornecidos para entender como realizar solicitações corretamente e interpretar as respostas.