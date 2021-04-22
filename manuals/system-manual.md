# Manual de Sistema

- [Placa](#placa)


## Placa
```Módulo NodeMcu ESP-12E```

Especificações: 
- 4MB de Memória FLASH;
- Módulo NodeMcu Lua ESP-12E;
- Wireless padrão 802.11 b/g/n;
- Antena embutida;
- Conector micro-usb.

## IoT Core

### Criando uma coisa (IoT)
1. Entre no [AWS Console](https://console.aws.amazon.com/console/home?region=us-east-1#);
2. Acesse o serviço IoT Core;
3. No menu lateral, selecione a opção **Gerenciar** e depois selecione a opção **Coisas**;
4. Clique no botão **Criar** e depois em **Criar uma única coisa**;
5. Digite um nome para a Coisa e clique em **Próximo**;
6. Clique em **Criar Certificado**;
7. Faça o download do **Um certificado para essa coisa** e **Uma chave privada**;
8. Clique em download ao lado de **Uma CA raiz para o AWS IoT**;
9. Faça o download da **RSA 2048 bit key**, e retorne para a página anterior;
10. Clique no botão **Ativar** e clique em **Concluído**.

---

### Anexando uma política aos certificados
1. No menu lateral, selecione a opção **Proteger** e depois selecione a opção **Políticas**;
2. Clique no botão **Criar**;
3. Defina um nome para a política;
4. Nos campos **Ação** e **Recursos ARN** digite ```*```, em **Efeitos** selecione a opção **Permitir**;
5. Clique no botão **Criar**;
6. Novamente No menu lateral, selecione a opção **Proteger** e depois selecione a opção **Certificados**;
7. Clique em ```•••```, selecione a opção **Anexar Política**;
8. Selecione a política criada e clique em **Anexar**.

---

## Arduino IDE

### Instalação
1. Entre no site do [Arduino](https://www.arduino.cc/en/software) e faça o download da IDE;

### Adicionando pacote para reconhecer a placa utilizada
1. Abra a IDE instalada anteriormente;
2. Conecte a placa ao seu computador por meio da entrada USB;
3. No menu superior, clique em **Ferramentas** ➞ **Porta** e verifique se apareceu uma nova **Porta Serial** e selecione-a;
4. No menu superior, clique em **Arquivo** ➞ **Preferências**;
5. No campo **URLs Adicionais para Gerenciadores de Placas** cole ```http://arduino.esp8266.com/stable/package_esp8266com_index.json``` e clique em **OK**;
6. No menu superior, clique em **Ferramentas** ➞ **Placa** ➞ **Gerenciador de Placas**;
7. Procure por **esp8266** e clique em **Instalar**;
8. No menu superior, clique em **Ferramentas** ➞ **Placa** ➞ **ESP8266 Boards** e selecione o modelo **NodeMCU 1.0 (ESP-12E Module)**;
9. Instale o arquivo de ferramentas disponível nesse [link](https://github.com/esp8266/arduino-esp8266fs-plugin/releases/tag/0.5.0) selecionando ``ESP8266FS-0.5.0.zip``;
10. Encontre o diretório do Arduino (geralmente fica na pasta de documentos), crie um diretório chamado ``tools`` e nela extraia o arquivo de ferramentas;
11. Reinicie a IDE do Arduino;
12. No menu superior, clique em **Ferramentas** e verifique se apareceu a opção **ESP8266 Sketch Data Upload**.

---

### Convertendo os certificados (.pem ➞ .der)
1. Caso esteja no Sistema Operacional Windows, recomenda-se fazer o download da ferramente [GitBash](https://gitforwindows.org/), para poder utilizar o **OpenSSL**;
2. Caso esteja no Sistema Operacional Linux, verifique se a ferramenta **OpenSSL** já está instalada, caso contrário, realize a instalação de acordo com a sua distribuição;
3. Com o terminal no diretório onde estão os certificados, digite os seguintes comandos para realizar as conversões, substituindo os 'xxxxxxxxxx' pelos nomes dos arquivos correspondentes:
```powershell
openssl x509 -in xxxxxxxxxx-certificate.pem.crt -out cert.der -outform DER 
openssl rsa -in xxxxxxxxxx-private.pem.key -out private.der -outform DER
openssl x509 -in AmazonRootCA1.pem -out ca.der -outform DER
```

---

### Preparando o ambiente para carregar o código na placa
1. Clone o repositório [TROCAR](www.github.com/AllanCapistrano)
2. No diretório do repositório clonado, crie um novo diretório chamado ``data`` e mova os certificados convertidos para o mesmo;
3. Abra o projeto na IDE do Arduíno, e preencha as credenciais necessárias: 
```cpp
const char* ssid = "nomeDaRede"; /*Nome da Rede WiFi*/
const char* password = "senhaDaRede"; /*Senha da Rede WiFi*/
```
4. No menu lateral do IoT Core, clique em **Configurações** e copie o Endpoint;
5. No código do Arduino, preencha com o seu endpoint como na linha abaixo:
```cpp
const char* AWS_endpoint = "seuEndpoint"; //Endpoint do dispositivo na AWS.
```
6. No menu superior, clique em **Ferramentas** ➞ **Gerenciar Bibliotecas**;
7. Faça o download das seguintes bibliotecas: ``PubSubClient``, ```NTPClient``` e ``LinkedList``.

### Carregando o código na placa
1. No menu superior, clique em **Ferramentas** ➞ **Flash Size** e clique em **4MB (2MB)**;
2. No menu superior, clique em **Ferramentas** ➞ **ESP8266 Sketch Data Upload** e aguarde a mensagem **Image Uploaded**;
3. Abaixo do menu superior clique na seta para a direita ``⮊`` para carregar o código na placa e aguarde a mensagem **Done Uploading**;
4. Abra o monitor serial 🔎, localizado no canto superior direito, selecione o valor ``115200 baud``, e aguarde a mensagem **Conectado**;

---

## Laravel

### Instalando o PHP
1. No Sistema Operacional Windows, recomenda-se a instalação da ferramenta [XAMPP](https://www.apachefriends.org/pt_br/index.html);
2. No Sistema Operacional Linux, instale o PHP de acordo com a sua distribuição;

---

### Instalando o Composer
1. No Sistema Operacional Windows, instale a ferramenta [Composer](https://getcomposer.org/);
2. No Sistema Operacional Linux, instale a ferramenta Composer de acordo com a sua distribuição;

---

### Configurando o projeto Laravel
1. Abra um terminal no diretório em que deseja criar o projeto, e digite os seguintes comandos:
```powershell
git clone https://github.com/AllanCapistrano/SD-PBL2-Web.git
composer install 
cp .env.example .env
php artisan key:generate
```

---

## Elastic Beanstalk e AWS RDS

### Hospedando a Aplicação Web
1. No diretório da aplicação Laravel, compacte todos arquivos menos o diretório oculto ``.git``;
2. Entre no [AWS Console](https://console.aws.amazon.com/console/home?region=us-east-1#);
3. Acesse o serviço Elastic Beanstalk;
4. Clique em **Create Application**
5. Insira o nome da aplicação;
6. Selecione a plataforma **PHP**, selecione **PHP 7.4** em **Ramificação da plataforma**;
7. Em **Código do aplicativo** selecione **Fazer upload do código** e escolha o arquivo compactado;
8. Clique em **Criar aplicativo**;
9. No menu lateral, clique em **Configuração**. Na categoria **Software** clique em **Editar**, em **Raiz do documento** digite ``/public`` e clique em **Aplicar**;
10. No menu lateral, clique em **Configuração**. Na categoria **Banco de dados** clique em **Editar**, digite o **Nome de usuário** e **Senha** (serão utilizados no ``.env``), e clique em **Aplicar**;
11. No menu lateral, clique em **Configuração**. Na categoria **Banco de dados** clique em **Endpoint**;
12. Na página do RDS, clique no Banco de Dados que foi gerado, copie o **Endpoint** e **Port**
13. Abra o arquivo ``.env`` no aplicação Laravel e altere os seguintes campos: 
```php
DB_HOST=endpointCopiado
DB_PORT=portCopiada
DB_USERNAME=nomeDeUsuarioDoBD
DB_PASSWORD=senhaDoBD
```
14. Ainda na página do Banco de Dados criado, clique em **Configuration** e copie o **DB name**
15. No arquivo ``.env``, altere o campo:
```php
DB_DATABASE=dbName
```
16. Abra um terminal no diretório do projeto, e digite os seguintes comandos:
```powershell
php artisan config:clear
php artisan migrate --seed
```
17. Novamente compacte todos arquivos menos o diretório oculto ``.git``;
18. Na parte do ambiente da aplicação no Elastic Beanstalk, clique em **Fazer upload e implantar**
19. Selecione o arquivo compactado, e clique em **Implantar**;

---

## AWS Lambda

### Adicionando função Lambda ao projeto
1. Entre no [AWS Console](https://console.aws.amazon.com/console/home?region=us-east-1#);
2. Acesse o serviço Lambda;
3. Clique em **Criar função**
4. Insira o nome da função
5. Selecione ``Python 3.8`` para a linguagem da função e clique em **Criar função**;
6. Apague o arquivo ```lambda_function.py``;
7. Faça o download do arquivo [lambda_funciton.zip](https://github.com/AllanCapistrano/SD-PBL2-Web/releases/tag/1.0)
8. Na página do Lambda, clique em **Fazer upload de** ➞ **arquivo .zip**, e selecione o ``lambda_funciton.zip`` baixado.

---

## Aplicação Web

1. Clique no link gerado pelo ambiente do Elastic Beanstalk para acessar a aplicação Web.
