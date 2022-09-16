<div class="mt-3">
    <div class="w-full text-center bg-teal-800 my-5 text-white font-bold p-2 rounded-lg">Adicionar Novo Cliente</div>
    <div class="m-1">
        <a href="{{route('list-customer')}}" class="btn-default mb-2">Lista de Cliente</a>
        @if (session()->has('sucesso'))
        <x-notification>
            {{ session('sucesso') }}
        </x-notification>
        @endif
    </div>
    <form wire:submit.prevent="submit">
        <div class="w-full">
            <label for="nome">Nome</label>
            <input type="text" id="nome" wire:model="nome" class="input" placeholder="Nome Completo">
            @error('nome')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex">
            <div class="m-1 w-full">
                <label for="cpf">CPF</label>
                <input id="cpf" wire:model.defer="cpf" class="input" x-data x-mask="999.999.999-99" placeholder="000.000.000-00">
                @error('cpf')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="m-1 w-full">
                <label for="rg">RG</label>
                <input type="text" id="rg" wire:model="rg" x-data x-mask="99.999.999-**" class="input" placeholder="00.000.000-00">
                @error('rg')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex">
            <div class="m-1 w-full">
                <label for="email">Email</label>
                <input type="text" id="email" wire:model="email" class="input" placeholder="email@email.com">
                @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="m-1 w-full">
                <label for="sexo">Sexo</label>
                <select id="sexo" class="input" wire:model="sexo">
                    <option>Selecione</option>
                    <option value="f">Feminino</option>
                    <option value="m">Masculino</option>
                </select>
                @error('sexo')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="w-full my-3 btn-salvar">Salvar</button>
    </form>
</div>
