<?php
Class Ator {
    private $ator_id;
    private $primeiro_nome;
    private $ultimo_nome;
    private $ultima_atualizacao;

	public function __construct($ator_id, $primeiro_nome, $ultimo_nome) {
	$this->ator_id = $ator_id;
	$this->primeiro_nome = $primeiro_nome;
	$this->ultimo_nome = $ultimo_nome;
	$this->ultima_atualizacao = new DateTime();
	}

	public function getAtor_id() {
		return $this->ator_id;
	}

	public function setAtor_id($ator_id): self {
		$this->ator_id = $ator_id;
		return $this;
	}

	public function getPrimeiro_nome() {
		return $this->primeiro_nome;
	}

	public function setUltimo_nome($ultimo_nome): self {
		$this->ultimo_nome = $ultimo_nome;
		return $this;
	}

	public function getUltimo_nome() {
		return $this->ultimo_nome;
	}

	public function getUltima_atualizacao() {
		return $this->ultima_atualizacao;
	}

	public function setUltima_atualizacao($ultima_atualizacao): self {
		$this->ultima_atualizacao = new DateTime();
		return $this;
	}

	/**
	 * @param mixed $primeiro_nome 
	 * @return self
	 */
	public function setPrimeiro_nome($primeiro_nome): self {
		$this->primeiro_nome = $primeiro_nome;
		return $this;
	}
}


?>