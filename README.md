Extensão do Zend_Tool

Esta ferramenta é um estudo para extender as funcionalidades do Zend_Tool.

Permite criar scaffold de um recurso.

% zf create scaffold resource-name module


Instalação:

copie a pasta Rph para um diretório no include_pah do PHP, normalmente em /usr/share/php

crie o arquivo .zf.ini na home do usuário, como o seguinte conteúdo.

php.include_path = ".:/usr/share/php:/usr/share/pear"
basicloader.classes.0 = "Rph_Tool_Project_Provider_Manifest"


para testar se funciona basta consultar o comando zf.

