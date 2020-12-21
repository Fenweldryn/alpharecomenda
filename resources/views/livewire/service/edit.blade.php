<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cadastrar novo serviço
        </h2>
    </x-slot>

    <form wire:submit.prevent="submit" class='grid gap-4 w-auto mx-5 md:mx-0 md:w-1/2'>
        @if (session()->has('success'))
            <div class="text-green-500 bg-white shadow-md rounded-md p-3 col-span-1">
                <i class="fas fa-check mr-2"> {{ session('success') }}</i>
            </div>
        @endif

        <div class="col-span-1">
            <label for="name">Nome</label>
            <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" wire:model="service.name">
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-1 mt-4">
            <label for="city">Cidade</label>
            <select wire:model="service.city" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                <option value=""></option>
                <option value="Macaé" default>Macaé</option>
                <option value="Rio das Ostras">Rio das Ostras</option>
            </select>
            <x-jet-input-error for="city" class="mt-2" />
        </div>

        <div class="col-span-1 mt-4">
            <label for="phone">Telefone</label>
            <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" wire:model="service.phone" required>
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <div class="col-span-1 mt-4">
            <label for="email">Email</label>
            <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="email" wire:model="service.email">
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-1 mt-4">
            <label for="keywords">Palavras-chave</label>
            <small class='text-sm block text-gray-400'>digite palavras separadas por um espaço que identifiquem o tipo do serviço. Exemplo: alimentação restaurante pizzaria pizza</small>
            <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" wire:model="keywords" placeholder="alimentação restaurante pizza pizzaria">
            <x-jet-input-error for="keywords" class="mt-2" required/>
        </div>

        @if (session()->has('success'))
            <div class="text-green-500 bg-white shadow-md rounded-md p-3 mt-3 col-span-1">
                <i class="fas fa-check mr-2"> {{ session('success') }}</i>
            </div>
        @endif

        <div class="col-span-1 mt-5 text-right">
            <a href="{{ url('servicos') }}" class="px-4 py-2 text-center border border-transparent bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-black font-bold rounded-lg mr-2">
                <i class="mr-2 fas fa-arrow-left"></i> Voltar
            </a>
            {{-- <button type="submit" 
                wire:loading.class="invisible"                 
                wire:target="submit"
                class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-red disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-trash mr-1"></i> Excluir
            </button> --}}
            <button type="submit" 
                wire:loading.class="invisible"                 
                wire:target="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-save mr-1"></i> Salvar Edição
            </button>
            <div wire:loading wire:target="submit">
                <i class="fas fa-spinner fa-pulse fa-2x"></i>
            </div>
        </div>
    </form>
</div>
