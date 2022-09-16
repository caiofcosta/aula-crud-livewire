<div>
    <div class="w-full text-center bg-teal-800 my-5 text-white font-bold p-2 rounded-lg">
        Listar Clientes
    </div>
    <a href="{{route('add-customer')}}" class="btn-default">Adicionar Cliente</a>
    @if (session()->has('sucesso'))
        <x-notification>
            {{ session('sucesso') }}
        </x-notification>
    @endif
    <div class="border-2 p-2 rounded-lg m-2">
        Filtrar:
        <label class="px-5">
            <input type="radio" wire:model="campoBusca" name="campoBusca" value="nome" class="accent-teal-300 focus:accent-teal-600"> Nome
        </label>
        <label class="px-5">
            <input type="radio" wire:model="campoBusca" name="campoBusca" value="cpf" class="accent-teal-300 focus:accent-teal-600"> CPF
        </label>
        <label class="px-5">
            <input type="radio" wire:model="campoBusca" name="campoBusca" value="rg" class="accent-teal-300 focus:accent-teal-600"> RG
        </label>
        <label class="px-5">
            <input type="radio" wire:model="campoBusca" name="campoBusca" value="email" class="accent-teal-300 focus:accent-teal-600"> Email
        </label>
        <input type="search" class="w-1/2 p-1 rounded-lg" wire:model.debounce.500ms="inputBusca">
        <a href="#" wire:click.prevent="limparPesquisa" class="btn-default">Limpar Pesquisa</a>
    </div>

    <div class=" bg-teal-600 text-white font-bold grid grid-cols-6">
        <div class="pl-1 text-center pt-2">Nome</div>
        <div class="pl-1 text-center pt-2">CPF</div>
        <div class="pl-1 text-center pt-2">RG</div>
        <div class="pl-1 text-center pt-2">Email</div>
        <div class="pl-1 text-center pt-2">Sexo</div>
        <div class="pl-1 text-center pt-2"> </div>
    </div>

    @foreach ($customers as $customer )
    <div class="
            grid
            grid-cols-6
            text-center
            odd:bg-teal-100
            even:bg-green-200
            hover:text-orange-600
            hover:bg-slate-200
            ">
        <div class="pl-1 w-full">{{$customer->nome}}</div>
        <div class="pl-1 ">{{$customer->cpf}}</div>
        <div class="pl-1 w-full">{{$customer->rg}}</div>
        <div class="pl-1 w-full">{{$customer->email}}</div>
        <div class="pl-1 mb-4  col-span-1  w-full">{{$customer->sexo}}</div>
        <div class="pl-1 mb-4  flex text-white w-full">
            <a href="#" x-data wire:click.prevent="idCustomerDelete({{$customer->id}})" @click="$dispatch('modal-abrir', {'show':true})" class="btn-delete">
                Apagar
            </a>
            <a href="{{ route('add-edit', $customer->id)}}" class="btn-edit">
                Editar
            </a>
        </div>
    </div>
    @endforeach

    {{ $customers->links() }}

    <x-modal tamanho="lg" btn_fechar="false">
        <x-slot:title>
            <div class="flex">
                <x-iconpark-delete class="w-5 h-5 text-red-800 mr-2"/>
                Apagar Registro
            </div>
        </x-slot>
        Deseja apagar o registro definitivamente?
        <div class="flex mt-3">
            <button @click="$dispatch('modal-abrir', {'show':false})" class="grow btn-cancel">Cancelar</button>
            <button wire:click="deleteData" @click="$dispatch('modal-abrir', {'show':false})" class="grow btn-delete">Apagar</button>
        </div>
    </x-modal>

</div>
