

# 📡 API REST em PHP Puro

Este repositório contém uma API RESTful simples desenvolvida em **PHP puro**, sem uso de frameworks, com o objetivo de demonstrar conceitos básicos de manipulação de dados em formato JSON por meio de requisições HTTP. 

---

## 🧠 Sobre o Projeto

A API simula uma aplicação de **gerenciamento de tarefas** (_To-Do List_), permitindo as operações de:

- 🔍 **GET**: Listar todas as tarefas ou uma tarefa específica
- ➕ **POST**: Criar uma nova tarefa
- ✏️ **PUT**: Atualizar uma tarefa existente
- ❌ **DELETE**: Remover uma tarefa

Os dados são armazenados em memória (um array PHP), apenas para fins de demonstração e aprendizado.

---

## ⚙️ Tecnologias

- PHP 7+
- Servidor local (Apache ou embutido via `php -S`)
- Formato de dados: JSON

---

## 🚀 Como executar

1. Clone o repositório:
   ```bash
   git clone https://github.com/sousaferreira/API-PHP.git
   cd API-PHP
````

2. Rode o servidor embutido do PHP:

   ```bash
   php -S localhost:8000
   ```

3. Teste as rotas com uma ferramenta como **Postman**, **Insomnia** ou usando `curl` no terminal.

---

## 🧪 Exemplos de uso (via `curl`)

### ➕ Criar nova tarefa

```bash
curl -X POST http://localhost:8000/tasks \
  -H "Content-Type: application/json" \
  -d '{"title": "Ler sobre APIs"}'
```

### 🔍 Listar todas as tarefas

```bash
curl http://localhost:8000/tasks
```

### 🔍 Ver uma tarefa específica

```bash
curl http://localhost:8000/tasks/1
```

### ✏️ Atualizar uma tarefa

```bash
curl -X PUT http://localhost:8000/tasks/1 \
  -H "Content-Type: application/json" \
  -d '{"completed": true}'
```

### ❌ Deletar uma tarefa

```bash
curl -X DELETE http://localhost:8000/tasks/1
```

---

## 📄 Estrutura esperada de uma tarefa

```json
{
  "id": 1,
  "title": "Estudar PHP",
  "completed": false
}
```

---

## 🏁 Objetivo

Este projeto foi desenvolvido com foco educacional para fins de prática e aprendizado de APIs REST usando PHP puro, ideal para quem está começando no desenvolvimento backend.

