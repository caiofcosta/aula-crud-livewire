<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class AddCustomer extends Component
{
    public $nome;
    public $rg;
    public $cpf;
    public $email;
    public $sexo;
    public $customer_id;

    protected $rules = [
        'nome' => 'required|min:4',
        'email' => 'required|email',
        'cpf' => 'required|min:14',
        'rg' => 'required|min:12',
        'sexo' => 'required',
    ];

    public function mount(Customer $customer)
    {
        $this->customer_id = $customer->id;
        $this->nome = $customer->nome;
        $this->email = $customer->email;
        $this->cpf = $customer->cpf;
        $this->rg = $customer->rg;
        $this->sexo = $customer->sexo;
    }

    public function submit()
    {
        $this->validate();

        Customer::updateOrCreate([
            'id' => $this->customer_id
        ],[
            'nome' => $this->nome,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'sexo' => $this->sexo,
        ]);

        session()->flash('sucesso', "Dados do cliente $this->nome salvo com sucesso.");

        if($this->customer_id){
            return redirect()->route('list-customer');
        }

        $this->reset(['nome','email','cpf','rg','sexo']);
    }

    public function render()
    {
        return view('livewire.customer.add-customer');
    }
}
