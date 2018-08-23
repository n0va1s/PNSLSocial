# Definição
Uma plataforma para gerenciar as ações sociais de instituições sociais.

# Proposta
**Para** instituições sociais <br />
**Que** buscam gerir suas ações sociais <br />
**O** social <br />
**É** um sistema <br />
**Diferente** daquelas planilhas salvas em vários lugares e enviadas por email, permite a gestão de: voluntários, usuários, ação social, frequência, atendimento, emitir certificados e prestar as contas anuais.

# Desenvolvedores
Felipe Toscano
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
* Configure a aplicação
> mv config-SAMPLE.in config.ini
> vi config.ini
* Insira primeiros valores do banco de dados
> mysql -u root -p;
> mysql source /src/../SQL/insert.sql
* Execute o servidor de aplicação
> php -S localhost:1234 -t web/
