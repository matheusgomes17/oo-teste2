<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Sao_Paulo');

require_once './autoload.php';

function criarDb() {
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
    $table1 = 'clientes';
    $table2 = 'enderecos';
    try {
        $pdo = new PDO('mysql:host=' . HOST, USER, PASS, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->query("CREATE DATABASE IF NOT EXISTS " . DBNAME . "");
        $pdo->query("use " . DBNAME . "");
        print("O banco de dados " . DBNAME . " foi criado com sucesso!<br>");
        $tabl = "DROP TABLE IF EXISTS {$table1};
                CREATE TABLE IF NOT EXISTS $table1(
                id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
                nome VARCHAR(255) NULL,
                razao VARCHAR(45) NULL,
                telefone VARCHAR(45) NULL,
                estrelas INT NULL,
                tipo VARCHAR(45) NULL,
                cpf VARCHAR(45) NULL,
                cnpj VARCHAR(45) NULL,
                ie VARCHAR(45) NULL,
                PRIMARY KEY (id));";
        $pdo->exec($tabl);
        print("A tabela {$table1} foi criada com sucesso!<br>");
        $tab2 = "DROP TABLE IF EXISTS {$table2};
                CREATE TABLE IF NOT EXISTS $table2(
                id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
                clientes_id INT NOT NULL,
                logradouro VARCHAR(255) NULL,
                numero INT NULL,
                cidade VARCHAR(255) NULL,
                estado VARCHAR(255) NULL,
                cep VARCHAR(45) NULL,
                PRIMARY KEY (id));";
        $pdo->exec($tab2);
        print("A tabela {$table2} foi criada com sucesso!<br>");
    } catch (PDOException $e) {
        die("Error: Código: {$e->getCode()} | Mensagem: {$e->getMessage()} |  Arquivo: {$e->getFile()} | linha: {$e->getLine()}");
    }
    return $pdo;
}

function inserirDados() {
    $conn = new \SON\Database\Connection(HOST, DBNAME, USER, PASS);
    $db = $conn->connect();
    if ($db) {
        if ($db->beginTransaction()) {
            try {
                $em = new \SON\Database\EntityManager($db);

                $cliente1 = new \SON\Cliente\Types\PessoaFisica("333.333.333-12", "José Silva", "011 4444-5555", 3);
                $cliente1->setEnderecos(new \SON\Cliente\Endereco("Rua Benedito Barbosa", 1200, "São Bernardo do Campo", "SP", "33333-333"));
                $cliente2 = new \SON\Cliente\Types\PessoaFisica("444.333.444-12", "Paulo Ferraz", "011 99999-4444", 4);
                $cliente2->setEnderecos(new \SON\Cliente\Endereco("Avenida Pereira Barreto", 1395, "Santo André", "SP", "45455-222"));
                $cliente3 = new \SON\Cliente\Types\PessoaJuridica("33.555.555/0001-01", "111.222.333.444", "Empresa 1 Ltda", "Empresa 1", "011 5555-5555", 2);
                $cliente3->setEnderecos(new \SON\Cliente\Endereco("Avenida Paulista", 1100, "São Paulo", "SP", "45455-222"));
                $cliente4 = new \SON\Cliente\Types\PessoaJuridica("33.444.777/0001-01", "555.222.888.444", "Empresa 2 S/A", "Empresa 2", "011 7777-5555", 5);
                $cliente4->setEnderecos(new \SON\Cliente\Endereco("Rua Augusta", 800, "São Paulo", "SP", "78787-354"))
                        ->setEnderecos(new \SON\Cliente\Endereco("Avenida Paulista", 1200, "São Paulo", "SP", "78787-458"));
                $cliente5 = new \SON\Cliente\Types\PessoaFisica("444.333.444-12", "Paulo Ferraz", "011 99999-4444", 4);
                $cliente5->setEnderecos(new \SON\Cliente\Endereco("Avenida Pereira Barreto", 1395, "Santo André", "SP", "45455-222"));
                $cliente6 = new \SON\Cliente\Types\PessoaJuridica("33.444.777/0001-01", "555.222.888.444", "Empresa 2 S/A", "Empresa 2", "011 7777-5555", 5);
                $cliente6->setEnderecos(new \SON\Cliente\Endereco("Rua Augusta", 800, "São Paulo", "SP", "78787-354"))
                        ->setEnderecos(new \SON\Cliente\Endereco("Avenida Paulista", 1200, "São Paulo", "SP", "78787-458"));
                $cliente7 = new \SON\Cliente\Types\PessoaFisica("444.333.444-12", "Paulo Ferraz", "011 99999-4444", 4);
                $cliente7->setEnderecos(new \SON\Cliente\Endereco("Avenida Pereira Barreto", 1395, "Santo André", "SP", "45455-222"));
                $cliente8 = new \SON\Cliente\Types\PessoaJuridica("33.444.777/0001-01", "555.222.888.444", "Empresa 2 S/A", "Empresa 2", "011 7777-5555", 5);
                $cliente8->setEnderecos(new \SON\Cliente\Endereco("Rua Augusta", 800, "São Paulo", "SP", "78787-354"))
                        ->setEnderecos(new \SON\Cliente\Endereco("Avenida Paulista", 1200, "São Paulo", "SP", "78787-458"));
                $cliente9 = new \SON\Cliente\Types\PessoaJuridica("33.444.777/0001-01", "555.222.888.444", "Empresa 2 S/A", "Empresa 2", "011 7777-5555", 5);
                $cliente9->setEnderecos(new \SON\Cliente\Endereco("Rua Augusta", 800, "São Paulo", "SP", "78787-354"))
                        ->setEnderecos(new \SON\Cliente\Endereco("Avenida Paulista", 1200, "São Paulo", "SP", "78787-458"));
                $cliente10 = new \SON\Cliente\Types\PessoaFisica("444.333.444-12", "Paulo Ferraz", "011 99999-4444", 4);
                $cliente10->setEnderecos(new \SON\Cliente\Endereco("Avenida Pereira Barreto", 1395, "Santo André", "SP", "45455-222"));

                $em->persist($cliente1);
                $em->persist($cliente2);
                $em->persist($cliente3);
                $em->persist($cliente4);
                $em->persist($cliente5);
                $em->persist($cliente6);
                $em->persist($cliente7);
                $em->persist($cliente8);
                $em->persist($cliente9);
                $em->persist($cliente10);

                $em->flush();
            } catch (Exception $e) {
                die("Erro: " . $e->getMessage());
            }
        }
    }
}

// Cria o banco de dados e as tabelas do sistema
criarDb();

// Alimenta o conteúdo das tabelas do banco de dados
inserirDados();
