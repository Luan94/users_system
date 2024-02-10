Este projeto foi criado utilizando o padrão de projeto de software MVC com php e javascript(para o jquery e algumas outras funcionalidades) utilizando MySQL como banco de dados


COMO EXECUTAR A APLICAÇÃO

-Você precisará do docker instalado em sua máquina para executar o projeto
-Monte as imagens que estão na pasta app e na pasta db
-Crie uma network,
-tenha certeza que o nome do container do database é seja "users_system_db" mas caso você tenha criado com um nome diferente ou deseja trocar troque a string da variável $host em app/connection.php linha 4
-rode os dois containers dentro desta mesma network


FEATURES SOLICITADAS QUE FORAM CRIADAS:

-Cadastro do usuário
-Validações do cadastro de usuário (para username valido, cpf , se o username já está em uso)
-Edição dos usuários
-Ver lista de usuários
-Cadastrar um endereço para o usuário (está na tela de edição de usuário)
-Deletar usuário

FEATURES QUE AINDA NÃO FORAM IMPLEMENTADAS:

-Algumas validações para o cadastro do usuário (verificar se RG já existe, verificar se CPF já existe, validações para data de nascimento, setar created_at para date-time atual)
-Edição de endereços
-Excluir endereços


