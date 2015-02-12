<?php

namespace app\Cliente\Interfaces;

use app\Cliente\Endereco;

interface ClienteInterface {

    public function setEstrelas($estrelas);

    public function getEstrelas();

    public function setEnderecos(Endereco $endereco);

    public function getEnderecos();
}
