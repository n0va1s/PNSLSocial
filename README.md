# Definição
Uma plataforma para gerenciar as ações de instituições sociais.

# Proposta
**Para** instituições sociais <br />
**Que** buscam gerir os atendimentos (individuais ou em grupo) <br />
**O** social <br />
**É** um sistema <br />
**Diferente** daquelas planilhas salvas em vários lugares e enviadas por email, permite a gestão de: voluntários, usuários, ação social, frequência, atendimento, emitir certificados e prestar as contas anuais.

# Desenvolvedores
Felipe Toscano <br />
João Paulo Novais

# Instalação
* Baixe arquivos
> git clone
* Vá para a pasta da aplicação
> cd PNSLSocial
* Baixe os componentes
> composer update
* Crie o banco de dados (MySQL)
> sudo php bin/doctrine-silex orm:schema-tool:create
* Configure o acesso ao banco de dados e as pastas da aplicação
> mv config-SAMPLE.in config.ini
> vi config.ini
* Faça a carga das tabelas básicas no banco de dados
> mysql -u root -p;
> mysql source /src/../SQL/insert.sql
* Defina a variável de ambiente de onde vc está executando (desenvolviemnto / produção)
> export APPLICATION_ENV=development
* Execute o servidor de aplicação na porta que desejar. Ex: 9999
> php -S localhost:9999 -t web/

# Atualização
* Verifique se houve atualização nos arquivos
> git pull
* Verifique se houve atualização no banco de dados
> php bin/doctrine-silex orm:schema-tool:update --dump-sql
* Se houver atualização, pegue o script gerado e execute no banco de dados
> mysql -u root -p;
> execute o script gerado
