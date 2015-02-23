<h1>Projeto 4 - PHP Orientação a Objetos</h1>
<h2>Persistência de dados</h2>

- Nessa última fase do projeto, você, ao invés de trabalhar com arrays, você deverá persistir essas informações no banco de dados.

- Em suas fixtures, você deverá criar uma classe com métodos específicos para persistirem dados no banco. Você terá que injetar no construtor dessa classe um objeto PDO (somente PDO).

- Crie um método chamado persist dentro dessa mesma classe; esse método deverá receber como dependência um objeto do tipo Cliente.

- E para finalizar, crie um método chamado flush. Quando o método for executado, os dados devem ser persistidos no banco de dados.

- Perceba que a responsabilidade de gravar os dados no banco são especificamente dessa classe, sem adicionar nenhuma outra responsabilidade a ela.

Boa sorte!

PS: Depois disso implementado, a listagem dos clientes devem ser chamadas a partir do banco de dados e não mais de um conjunto de arrays.

<h2>Como usar</h2>

- Tenha certeza que tenha instalado o PHP5. Em versões inferiores o sistema poderá ocorrer erros.
- Execute o comando no Git: <b>php fixture.php</b> para inserir o banco de dados e suas tabelas.
- Execute o comando no Git: <b>php -S localhost:8090 -t public</b>
- Para fazer a conecção com o banco de dados basta alterar as constantes no arquivo <b>autoload.php</b>
(dados padrões para o acesso user: <b>root</b> password: <b>root</b>)
