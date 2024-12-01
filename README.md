# REFOOD
O projeto é um sistema de refeitório que apresenta os cardápios diários do mesmo, contendo pratos principais (com imagem, descrição e avaliação dos usuários), acompanhamentos e sobremesas. 
A avaliação citada é feita apenas se o usuário estiver logado (controle de sessão), podendo fazer login ou cadastrar uma conta.  
A ideia é um refeitório que sirva apenas almoço, entretanto o projeto pode evoluir e adicionar também um cardápio de jantar, por exemplo.  
O Refood foi desenvolvido principalmente em PHP, utilizando HTML, CSS e JavaScript, juntamente com a biblioteca Bootstrap. Pensado no padrão MVC, separando em View (contato direto com usuário), Controllers (faz a "ponte" entre o usuário e a manipulação do banco de dados) e Models (manipulação direta ao banco).  
Sua parte administrativa contém toda parte de cadastro de pratos, acompanhamentos e sobremesas, que relacionam-se entre si no cadastro dos cardápios. Também há a listagem de todos estes elementos, a edição de algum elemento desejado e o controle de administradores, podendo conceder autorização de administrador a outro usuário ou removê-la.  
  
[Link para vídeo demonstrativo do sistema](https://drive.google.com/file/d/1oNFoyWzYS_QP3-aTegy7-yTnYf-Zsf5a/view?usp=share_link)  

## Instruções
Para executar o projeto, basta ter o PHP e MySQL instalado em sua máquina. Assim, no MySQL Workbench pode importar o banco de dados que encontra-se neste mesmo diretório, chamado "refood.sql".  
Caso tenha que manipular nome de usuário ou senha para acesso ao banco, o arquivo de controle encontra-se em "/models/ConexaoBD.php".  
O PHP pode ser executado na ferramenta de sua preferência. Eu recomendo utilizar o Visual Studio Code e executar o servidor através da extensão "PHP Server".  
Então, pode usufruir do sistema e testar suas funcionalidades!  
Caso queira acessar a parte administrativa, pode ser feito através do email "teste1@teste.com" e da senha "1234".