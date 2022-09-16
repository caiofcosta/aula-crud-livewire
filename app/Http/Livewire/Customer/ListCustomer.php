<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class ListCustomer extends Component
{

    use WithPagination;

    public $campoBusca = "nome";

    public $inputBusca;

    public $customer_id;

    public function limparPesquisa()
    {
        $this->reset(['campoBusca','inputBusca']);
    }

    public function deleteData()
    {
        Customer::where('id',$this->customer_id)->delete();
    }

    public function idCustomerDelete($id)
    {
        $this->customer_id=$id;
    }


    public function render()
    {   $customer = Customer::query();

        $customer->when($this->campoBusca != "null" && $this->inputBusca != "", function($query){
            return $query->where( $this->campoBusca ,"like","%$this->inputBusca%");
        });

        return view('livewire.customer.list-customer',['customers' => $customer->orderBy('nome','asc')->paginate(3)])->extends('layouts.teste')->section('content');
    }
}
