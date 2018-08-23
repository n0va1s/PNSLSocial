# Definição
Uma plataforma para gerenciar as ações sociais de instituições sociais.

# Proposta
**Para** instituições sociais <br />
**Que** buscam gerir suas ações sociais <br />
**O** social <br />
**É** um sistema <br />
**Diferente** daquelas planilhas salvas em vários lugares e enviadas por email, permite a gestão de: voluntários, usuários, ação social, frequência, atendimento, emitir certificados e prestar as contas anuais.

# Desenvolvedores
André Portilho (frontend)
João Paulo Novais (backend)

# Instalação
* Baixar arquivos
> git clone
* Vá para a pasta da aplicação
> cd quadro_magico
* Criar o banco de dados (MySQL)
> sudo php bin/doctrine-silex orm:schema-tool:create
* Executar os scripts disponíveis em /src/../SQL
* Baixar os componentes
> composer update
* Executar o servidor de aplicação
> php -S localhost:1234 -t web/
