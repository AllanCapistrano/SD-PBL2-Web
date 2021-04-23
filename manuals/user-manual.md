# Manual de Usuário

## Link da aplicação Web
### [TechBulb](http://techbulb-env.eba-9iwqr9sh.us-east-1.elasticbeanstalk.com/)

- [Página Inicial](#página-inicial)
- [Página de Horário](#página-de-horário)
- [Página de Histórico](#página-de-histórico)


---

## [Página Inicial](http://techbulb-env.eba-9iwqr9sh.us-east-1.elasticbeanstalk.com/)

### Ligar/Desligar a lâmpada
Para ligar/desligar clice no ícone 💡 presente no centro da tela. O estado atual da mesma é descrito abaixo do ícone.

<p align="center">
  <img src="../manual-images/light_bulb.png" width="70%">
</p>

---

### Definir Temporizador
No campo abaixo do ícone 💡, é possível definir um novo temporiador. O formato para definir o tempo é seguinte ``H:m:s``, onde ``H`` representa as horas; 
``m`` representa os minutos; ``s`` representa os segundos.

A ação que a lâmpada irá realizar (ligar/desligar), será definida pela chave ao lado do campo de tempo (Esquerda ➞ Desligar | Direita ➞ Ligar).

Após definir todos os campos, clique em ``Ativar``.

Exemplo definindo que a lâmpada ficará ligada por um tempo de 5 minutos:

<p align="center">
  <img src="../manual-images/timer.png" width="70%">
</p>

---

## [Página de Horário](http://techbulb-env.eba-9iwqr9sh.us-east-1.elasticbeanstalk.com/schedule)

### Definir Horários
É necessário definir um horário de início e de fim, em que durante esse tempo, a lâmpada irá executar a ação indicada (ligar/desligar) pela chave ao 
lado do campo de horário de fim (Esquerda ➞ Desligar | Direita ➞ Ligar).

O formato para os horários (início e fim) seguem o mesmo formato do temporizador (``H:m:s``). 

Após definir todos os campos, clique em ``Ativar``.

É possível definir vários horários, que estarão listados na parte inferior da página.

**Obs: A definição dos horários só será válida, caso o horário de fim seja maior que o de início.**

<p align="center">
  <img src="../manual-images/schedule.png" width="70%">
</p>

É possível excluir os horários criados, clicando no botão 🗑️

<p align="center">
  <img src="../manual-images/delete_schedule.png" width="70%">
</p>

---

## [Página de Histórico](http://techbulb-env.eba-9iwqr9sh.us-east-1.elasticbeanstalk.com/historic)

### Definir Tarifa Mensal
Defina a tarifa para o mês desejado, escrevendo o valor no primeiro campo, e selecionando o mês/ano no segundo campo.

Após definir todos os campos, clique em ``Salvar``.

<p align="center">
  <img src="../manual-images/historic.png" width="70%">
</p>

**Obs: Caso seja definida uma tarifa para um mês/ano que já esteja cadastrado, a anterior será sobrescrita e os preços relacionados com a tarifa daquele
mês serão atualizados automaticamente.**

---

### Atualizar Histórico
Sempre que quiser saber as informações mais recentes, clique no botão 🔄 para atualiar a tabela do histórico.

<p align="center">
  <img src="../manual-images/refresh.png" width="70%">
</p>
