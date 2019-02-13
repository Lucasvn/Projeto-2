<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->helper('url');
	}

	public function index(){
			$dados['empresa'] = $this->empresa_model->GetAll('nome');
			$dados['page'] = 'emp';
			//$dados['empresa'] = $this->empresa_model->Formatar($empresa);
			$this->template->load('template', 'home', $dados);
	}

	public function OrderPDF(){
		$dados['empresas'] = $this->empresa_model->GetAll('nome');
		$dados['page'] = 'colab';
		$this->template->load('template', 'OrderPDF', $dados);
	}

	public function GerarPDF_Emp(){
		$this->load->library('Pdf');

		$dados['empresa'] = $this->empresa_model->GetAll('nome');
		$html = $this->template->load('pdf', 'listEmp', $dados, TRUE);

		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Lista de empresas');
		$pdf->setHeaderMargin(30);
		$pdf->setTopMargin(20);
		$pdf->setAuthor('Projeto2');

		$pdf->AddPage('P', false, false); // L == paisagem, P == retrato
		$pdf->writeHTML($html);
		$pdf->Output('lista_empresas.pdf', 'I'); // I == enviar p/ browser,  F == salvar no PC

	}
	public function GerarPDF_Colab(){
		$this->load->library('Pdf');
		$dados['colaborador'] = $this->colaborador_model->GetColaboradorBySexo('feminino');
		$html = $this->template->load('pdf', 'listColab', $dados, TRUE);

		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Lista de Colaboradores');
		$pdf->setHeaderMargin(30);
		$pdf->setTopMargin(20);
		$pdf->setAuthor('Projeto2');

		$pdf->AddPage('P', false, false); // L == paisagem, P == retrato
		$pdf->writeHTML($html);
		$pdf->Output('lista_colaboradores.pdf', 'I'); // I == enviar p/ browser,  F == salvar no PC

	}

	public function colaboradores(){
			$dados['colaborador'] = $this->colaborador_model->GetAll('nome');
			$dados['empresas'] = $this->empresa_model->GetAll('nome');
			$dados['page'] = 'colab';
			$this->template->load('template', 'colaboradores', $dados);

	}

	public function addE(){
			$dados['page'] = 'emp';
			$this->template->load('template', 'addE', $dados);
	}
	public function addC(){
			$dados['empresa'] = $this->empresa_model->GetAll('nome');
			$dados['page'] = 'emp';
			$this->template->load('template', 'addC', $dados);
	}

	public function Salvar_empresa(){
			// Recupera as empresas através do model
			$empresa = $this->empresa_model->GetAll('nome');
			// Executa o processo de validação do formulário
			$validacao = self::Validar_empresa();
			// Verifica o status da validação do formulário
			// Se não houverem erros, então insere no banco e informa ao usuário
			// caso contrário informa ao usuários os erros de validação
			if($validacao){
				// Recupera os dados do formulário
				$empresa = $this->input->post();
				// Insere os dados no banco recuperando o status dessa operação
				$status = $this->empresa_model->Inserir($empresa);
				// Checa o status da operação gravando a mensagem na seção
				if(!$status){
					$dados['erro'] = 'addE';
					$dados['page'] = 'emp';
					$this->template->load('template', 'error', $dados);
				}else{
					redirect();
				}
			}else{
				$dados['page'] = 'emp';
				$dados['erro'] = 'addE';
				$this->template->load('template', 'error', $dados);
			}
		}

	public function Salvar_colaborador(){
				$colaborador = $this->colaborador_model->GetAll('nome');
				$validacao = self::Validar_colaborador();
				if($validacao){
					$colaborador = $this->input->post();
					$status = $this->colaborador_model->Inserir($colaborador);
					if(!$status){
						$dados['erro'] = 'addC';
						$dados['page'] = 'emp';
						$dados['empresa'] = $this->empresa_model->GetAll('nome');
						$this->template->load('template', 'error', $dados);
					}else{
						redirect(base_url('colaboradores'));
					}
				}else{
					$dados['erro'] = 'addC';
					$dados['page'] = 'emp';
					$dados['empresa'] = $this->empresa_model->GetAll('nome');
					$this->template->load('template', 'error', $dados);
				}
			}

	public function Editar_empresa(){
				// Recupera o ID do registro - através da URL - a ser editado
				$id = $this->uri->segment(2);
				// Se não foi passado um ID, então redireciona para a home
				if(is_null($id))
					redirect();
				// Recupera os dados do registro a ser editado
				$dados['empresa'] = $this->empresa_model->GetEmpresaById($id);
				if(is_null($dados)){
					redirect();
				}
				// Carrega a view passando os dados do registro
				$dados['page'] = 'emp';
				$this->template->load('template', 'editarE', $dados);
			}

	public function Editar_colaborador(){
				// Recupera o ID do registro - através da URL - a ser editado
				$id = $this->uri->segment(2);
				// Se não foi passado um ID, então redireciona para a home
				if(is_null($id))
					redirect(base_url('colaboradores'));
				// Recupera os dados do registro a ser editado
				$dados['empresas'] = $this->empresa_model->GetAll('nome');
				$dados['page'] = 'emp';
				$dados['colaborador'] = $this->colaborador_model->GetColaboradorById($id);
				// Carrega a view passando os dados do registro
				$this->template->load('template', 'editarC', $dados);
			}

	public function Atualizar_empresa(){
				// Realiza o processo de validação dos dados
				$validacao = self::Validar_empresa('update');
				// Verifica o status da validação do formulário
				// Se não houverem erros, então insere no banco e informa ao usuário
				// caso contrário informa ao usuários os erros de validação

				$dados['empresa'] = $this->empresa_model->GetEmpresaById($this->input->post('id_empresa'));
				if($validacao){
					// Recupera os dados do formulário
					$empresa['nome'] = $this->input->post('nome');
					$empresa['CNPJ'] = $this->input->post('cnpj');
					$empresa['email'] = $this->input->post('email');
					// Atualiza os dados no banco recuperando o status dessa operação
					$status = $this->empresa_model->Atualizar_empresa($this->input->post('id_empresa'),$empresa);
					// Checa o status da operação gravando a mensagem na seção
					if(!$status){
						$dados['empresa'] = $this->empresa_model->GetEmpresaById($this->input->post('id_empresa'));
						$dados['erro'] = 'editarE';
						$dados['page'] = 'emp';
						$this->template->load('template', 'error', $dados);
					}else{
						// Redireciona o usuário para a home
						redirect();
					}
					}else{
						$dados['erro'] = 'editarE';
						$dados['page'] = 'emp';
						$this->template->load('template', 'error', $dados);
					}
					// Carrega a view para edição
					//$this->template->load('template', 'editarE');
			}

	public function Atualizar_colaborador(){
				// Realiza o processo de validação dos dados
				$validacao = self::Validar_colaborador('update');
				// Verifica o status da validação do formulário
				// Se não houverem erros, então insere no banco e informa ao usuário
				// caso contrário informa ao usuários os erros de validação
				if($validacao){
					// Recupera os dados do formulário
					$colaborador = $this->input->post();
					// Atualiza os dados no banco recuperando o status dessa operação
					$status = $this->colaborador_model->Atualizar_colaborador($colaborador['id_colaborador'],$colaborador);
					// Checa o status da operação gravando a mensagem na seção
					if(!$status){
						$dados['empresas'] = $this->empresa_model->GetAll('nome');
						$dados['colaborador'] = $this->colaborador_model->GetColaboradorById($this->input->post('id_colaborador'));
						$dados['erro'] = 'editarC';
						$dados['page'] = 'emp';
						$this->template->load('template', 'error', $dados);
					}else{
						redirect(base_url('colaboradores'));
					}
				}else{
					$dados['empresas'] = $this->empresa_model->GetAll('nome');
					$dados['colaborador'] = $this->colaborador_model->GetColaboradorById($this->input->post('id_colaborador'));
					$dados['erro'] = 'editarC';
					$dados['page'] = 'emp';
					$this->template->load('template', 'error', $dados);
				}
			}

	public function Excluir_colaborador(){
				// Recupera o ID do registro - através da URL - a ser editado
				$id = $this->uri->segment(2);
				// Se não foi passado um ID, então redireciona para a home
				if(is_null($id))
					redirect(base_url('colaboradores'));
				// Remove o registro do banco de dados recuperando o status dessa operação
				$status = $this->colaborador_model->Excluir_colaborador($id);
				// Checa o status da operação gravando a mensagem na seção
				if($status){
				redirect(base_url('colaboradores'));
				// Redirecionao o usuário para a home
			}redirect(base_url('colaboradores'));

	}

	public function Excluir_empresa(){
				// Recupera o ID do registro - através da URL - a ser editado
				$id = $this->uri->segment(2);
				// Se não foi passado um ID, então redireciona para a home
				if(is_null($id))
					redirect();
				// Remove o registro do banco de dados recuperando o status dessa operação
				$status = $this->empresa_model->Excluir_empresa($id);
				// Checa o status da operação gravando a mensagem na seção
				if($status){
					$this->session->set_flashdata('success', '<p>Empresa excluído com sucesso.</p>');
				}else{
					$this->session->set_flashdata('error', '<p>Não foi possível excluir o empresa.</p>');
				}
				// Redirecionao o usuário para a home
				redirect();
	}

	private function Validar_empresa($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação
		switch($operacao){
			case 'insert':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['cnpj'] = array('trim', 'required', 'min_length[14]', 'is_unique[empresa.CNPJ]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[empresa.email]');
				break;
			case 'update':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['cnpj'] = array('trim', 'required', 'min_length[14]');
				$rules['email'] = array('trim', 'required', 'valid_email');
				break;
			default:
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['cnpj'] = array('trim', 'required', 'min_length[14]', 'is_unique[empresa.CNPJ]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[empresa.email]');
				break;
		}
		$this->form_validation->set_rules('nome', 'Nome', $rules['nome'], array(
                'required'      => 'Você não inseriu %s.'
        				));
		$this->form_validation->set_rules('email', 'Email', $rules['email'], array(
                'required'      => 'Você não inseriu %s.',
                'is_unique'     => 'Este %s já foi cadastrado.'
        				));
		$this->form_validation->set_rules('cnpj', 'CNPJ', $rules['cnpj'], array(
                'required'      => 'Você não inseriu %s.',
                'is_unique'     => 'Este %s já foi cadastrado.'
        				));
		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}

	private function Validar_colaborador($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação
		switch($operacao){
			case 'insert':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[colaborador.email]');
				$rules['cpf'] = array('trim', 'required', 'min_length[11]', 'is_unique[colaborador.cpf]');
				break;
			case 'update':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email');
				$rules['cpf'] = array('trim', 'required', 'min_length[11]');
				break;
			default:
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[colaborador.email]');
				$rules['cpf'] = array('trim', 'required', 'min_length[11]', 'is_unique[colaborador.cpf]');
				break;
		}
		$this->form_validation->set_rules('nome', 'Nome', $rules['nome'], array(
                'required'      => 'Você não inseriu %s.'
        				));
		$this->form_validation->set_rules('email', 'Email', $rules['email'], array(
                'required'      => 'Você não inseriu %s.',
                'is_unique'     => 'Este %s já foi cadastrado.'
        				));
		$this->form_validation->set_rules('cpf', 'CPF', $rules['cpf'], array(
                'required'      => 'Você não inseriu %s.',
                'is_unique'     => 'Este %s já foi cadastrado.'
        				));
		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}

}
