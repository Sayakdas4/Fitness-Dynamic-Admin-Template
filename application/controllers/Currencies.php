<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currencies extends CI_Controller {

	function __construct()
    {
        parent::__construct();		
		$this->load->model('Currencies_model');
    }
	
	/* Default function */
	public function index()
	{
		$data['fromCurrency'] = 'INR';
		$data['toCurrency'] = 'USD';
		$amount = 1;
		$data['amount'] = $amount;
		$this->load->library('currency_converter', $data);
		$data['country_details'] = $this->Currencies_model->get_country_list(); 
		// dd($data['country_details']);
		$data['page_title'] = 'CodeIgniter Currency Converter Library';			
		$data['conversion_result'] =  $this->currency_converter->getResult();
		dd($data['conversion_result']);
		$this->load->view('currency_converter',$data);
	}
	
	/* Function to convert*/
	public function convert(){				
		$data['fromCurrency'] = $this->input->post('fromCurrency');
		$data['toCurrency'] = $this->input->post('toCurrency');
		$data['amount'] = $this->input->post('amount');
		dd($this->input->post());
		$this->load->library('currency_converter', $data);
		$data['country_details'] = $this->Currencies_model->get_country_list(); 
		$data['page_title'] = 'CodeIgniter Currency Converter Library';			
		$data['conversion_result'] =  $this->currency_converter->getResult();		
		$this->load->view('currency_converter',$data);
	}
}

/* End of file Currencies.php */
/* Location: ./application/controllers/Currencies.php */