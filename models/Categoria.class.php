<?php
Class Categoria {
    private $categoria_id;
    private $nome;
    private $ultima_atualizacao;

	public function __construct($catedoria_id, $nome) {
	$this->categoria_id = $catedoria_id;
	$this->nome = $nome;
	$this->ultima_atualizacao = new DateTime();
	}

	public function getCategoria_id() {
		return $this->categoria_id;
	}

	public function setCategoria_id($categoria_id): self {
		$this->categoria_id = $categoria_id;
		return $this;
	}
    
	public function setNome($nome): self {
		$this->nome = $nome;
		return $this;
	}
    
	public function getNome() {
		return $this->nome;
	}

	public function getUltima_atualizacao() {
		return $this->ultima_atualizacao;
	}

	public function setUltima_atualizacao($ultima_atualizacao): self {
		$this->ultima_atualizacao = $ultima_atualizacao;
		return $this;
	}
}

?>