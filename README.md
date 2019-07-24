# EABlender - Image

É um plugin da família EABlender, que coleta orçamentos e envia para o [App do Entenda antes](https://app.entendaantes.com.br) 

## O que ele faz?

O EABlender - Image coleta dados dos profissionais/empresas e constrói um card
personalizado com o intuito de gerar mais orçamentos.
Este card exibe as seguintes informações:

*Imagem de perfil
*Nome do usuário
*Segmento - Apenas o primeiro do array
*Imagem de Destaque - Pode ser de vitrine de produtos ou de coleção de ideias.
*Botão de Solicitar Orçamento

É necessário apenas duas etapas para construir o card personalizado

* Etapa 1:
  *Em configurações no Painel do wordpress existe uma opção como sub-menu chamada "eablender-options",
  *nesta opção é necessário preencher 4 campos que são:

  *Apenas um exemplo de preenchimento:
      IMAGE_S3: https://aes-entenda-antes-teste-arquivos.s3.amazonaws.com/
      IMAGE_S3_RESIZED: https://aes-entenda-antes-arquivosresized.s3.amazonaws.com/
      API: https://gama.entendaantes.com.br:8443/
      URL_USER: https://app.entendaantes.com.br/site/

  Ambos os campos Image_s3 são responsáveis por trazer o caminho do s3 para as imagens do card personalizado
  O campo API é responsável por trocar a base de dados do sistema.
  O campo URL_USER é responsável por redirecionar o usuário para página do profissional/empresa ao clicar em solicitar orçamento.

* Etapa 2:

  *Adicione o shortcode onde deseja
  *Ex: [eablender-image id="d0e1495e-b932-441d-bea3-f86dceca7be0"]

  *id="d0e1495e-b932-441d-bea3-f86dceca7be0" é referente ao id da imagem de destaque. 


## Como instalar?

Faça o download do repositório como ZIP e instale no Wordpress

## Como usar?

Insira o shortcode `[eablender-image id="algum id aqui"]` no lugar onde deve ser exibido o EABlender - Image

## Como não usar?

Certifique-se de inserir as informações corretas no formulário do sub-meu do menu configurações do wordpress

Certifique-se de inserir o shortcode com a sintaxe correta e com um id válido.

## Requisitos:

* Preencher os campos do formulário do wordpress presentes em configurações->eablender-options

* Inserir o shortcode `[eablender-image id="algum id aqui"]`

## Erros esperados:
* **API do Entenda Antes inacessível:** O plugin deve retornar uma mensagem ao usuário dizendo que a API está inacessível
* Campos obrigatórios faltantes
  * O administrador deverá preencher as informações do fomulário em configurções->eablender-options.
* Outros erros encontrados devem ser anotados aqui, com suas (prováveis) soluções

## Licença
[Comercial](https://www.example.com/)