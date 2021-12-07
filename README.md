# TODOLIST
Este é um pequeno projeto de 'lista de tarefas', criada com o objetivo de aprender e praticar o uso do Laravel(8.*). Estes são meus primeiros passos no Laravel.

## RECURSOS IMPLEMENTADOS
* Registro e login de usuário e
* Cadastro, visualização, atualização e exclusão de tarefas.

## INSTALANDO E EXECUTANDO A APLICAÇÃO
1. Clone o projeto para a pasta do seu servidor local;
2. Copie e renomeie o arquivo de configuração **.env.example** para **.env**, e faça as devidas parametrizações(APP_NAME, DB_DATABASE, DB_USERNAME, DB_PASSWORD);
3. Execute os comandos `composer update` e `npm install` para instalar os componentes necessários ;
4. Crie o banco de dados e então execute `php artisan migrate` para criar as tabelas necessárias e
5. Agora basta executar `php artisan serve` e acessar o projeto pelo link disponibilizado após a execução do comando.