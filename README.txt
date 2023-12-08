Este projeto foi criado utilizando o padrão de projeto de software MVC com php e javascript(para o jquery e algumas outras funcionalidades) utilizando MySQL como banco de dados

Para a criação do servidor da aplicação utilizei o XAMPP XAMPP Version: 8.2.12 e o seu php na versão 8.2.12
você pode baixar o xampp através deste site:
https://www.apachefriends.org/pt_br/index.html

COMO EXECUTAR A APLICAÇÃO

1- Crie uma pasta para o projeto e insira os arquivos deste repositório na pasta que foi criada 

2- Para a criação do banco de dados para utilizar neste projeto vá até a pasta "db" nela há um arquivo que poderá ser importado para a criação do database que será utilizado no projeto OU crie um novo database e rode os scripts de geração do banco de dados
um para a tabela "users" e outro para a tabela "users_addresses"

3- (OPCIONAL)-Caso seu ambiente esteja configurada de alguma maneira que não seja a padrão do XAMPP, vá até a pasta config e abra o arquivo connection e faça os ajustes necessários para a conexão com seu banco de dados do servidor
aqui você pode trocar a url, usuário e nome do banco de dados e adicionar quaisquer informação necessária para o funcionamento da conexão com o database

4-Execute o XAMPP E inicia o apache server o MySQL server (os dois primeiros botões de cima para baixo)

5-Para uma conexão local(Padrão) vá Até http://localhost/NOME DA PASTA QUE FOI CRIADA NO PASSO 1/index.php

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


