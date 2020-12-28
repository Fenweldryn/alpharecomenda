<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cadastrar novo serviço
        </h2>
    </x-slot>

    <form wire:submit.prevent="submit" class='grid gap-4 grid-cols-1 md:grid-cols-2 w-auto mx-5 md:mx-0 md:w-auto'>
        <div>            
            @if (session()->has('success'))
                <div class="text-green-500 bg-white shadow-md rounded-md p-3">
                    <i class="fas fa-check mr-2"> {{ session('success') }}</i>
                </div>            
            @endif
            <div class="col-span-1">
                <label for="name">Nome</label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" wire:model.debounce.300ms="name" placeholder="">
                <x-jet-input-error for="name" class="mt-2" />
            </div>
    
            <div class="col-span-1 mt-4">
                <label for="city">Cidade</label>
                <select wire:model="city" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                    <option value=""></option>
                    <option value="Macaé" default>Macaé</option>
                    <option value="Rio das Ostras">Rio das Ostras</option>
                </select>
                <x-jet-input-error for="city" class="mt-2" />
            </div>
    
            <div class="col-span-1 mt-4">
                <label for="phone">Telefone com DDD (somente números)</label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" wire:model="phone" placeholder="" required>
                <x-jet-input-error for="phone" class="mt-2" />
            </div>
    
            <div class="col-span-1 mt-4">
                <label for="email">Email</label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="email" wire:model="email">
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
                <button type="submit" 
                    wire:loading.class="invisible"                 
                    wire:target="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fas fa-save mr-1"></i> Salvar
                </button>
                <div wire:loading wire:target="submit">
                    <i class="fas fa-spinner fa-pulse fa-2x"></i>
                </div>
            </div>
        </div>

        <div class="md:ml-5">
            <label for="" class='block'>Serviços de mesmo nome cadastrados</label>
            <div wire:loading wire:target="name" class='block mt-5'>
                <i class="fas fa-spinner fa-pulse fa-5x"></i>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-7 mt-5" wire:target="name" wire:loading.class="invisible">
                @foreach ($similarServices as $service)
                  <div class="flex flex-wrap bg-white rounded-lg border-l-8 border-blue-800 w-full" wire:key="card-{{ $service->id }}">
                    <div class="rounded-lg w-full">          
                      <div class="w-full p-4">
                        <div class='relative'>
                          <h2 class="font-bold text-2xl text-blue-700 inline">{{$service->name}}</h2>
                          @can('update', $service)
                            <a href="{{ url('servicos',$service->id) }}/editar" class='absolute top-2 right-2'><i class="fas fa-pencil-alt text-blue-300 float-right"></i></a>                    
                          @endcan
                        </div>
                        <div class="py-2 text-sm text-gray-400">
                            <p class="mt-1">
                              <a target="_blank" href="https://wa.me/55{{ $service->phone }}"> <i class="fas fa-phone-alt mr-1"></i> {{ $service->phone }}</a>
                            </p>                  
                            <p class="mt-1">
                              <i class="fas fa-map-marker-alt mr-1"></i> {{ $service->city }}
                            </p>                  
                            @if ($service->email)
                            <p class='mt-1'>
                              <i class="fas fa-envelope mr-1"></i> {{ $service->email }}
                            </p>                        
                            @endif
                        </div>
                      </div>
                    </div>
  
                    <div class='w-full p-4 pt-0'>
                      <p>
                        <label for="" class="font-bold"> Palavras-chave:</label> 
                        @foreach ($service->tags as $tag)
                          <span >{{ $tag->name }}</span>     
                        @endforeach
                      </p>
                    </div>

                  </div>          
                @endforeach
            </div>
        </div>
    </form>

    <div class="md:invisible">
        <x-scroll-top-button/>
    </div>
</div>
