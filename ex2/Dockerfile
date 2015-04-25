#1.1: Criar um Dockerfile que:
#Tenha por base a imagem Ubuntu
#Execute os comandos:
#apt-get update
#instale o apache2 usando o comando apt-get e a opção -y
#	TIP: consultar slide 12
#1.2: Fazer o build da Imagem utilizando o Dockerfile anteriormente criado.
#	TIP: consultar slide 13
#1.3: Inicializar o Container a partir da imagem criada anteriormente, mapeando a porta 9000 do host para a porta 80 do Container, #montando o directório html no directório /var/www/html do Container e usando as opções i, t e d.
#TIP: consultar slide 13
#1.4 Aceder através do browser ao endereço localhost:9000.
#1.5 Efectuar uma alteração ao ficheiro index.html e voltar a aceder ao endereço localhost:9000. 
#1.6 Verificar o Id do Container.
#	TIP: consultar slide 14
#1.7 Parar e remover o Container.
#TIP: consultar slide 15

FROM ubuntu 

RUN apt-get update && apt-get install -y apache2

ENTRYPOINT /usr/sbin/apache2ctl -D FOREGROUND
