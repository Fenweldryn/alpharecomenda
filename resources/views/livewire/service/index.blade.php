<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Serviços') }}             
        </h2>
    </x-slot>

    <div class=" bg-white mb-10 rounded-md flex items-center w-full p-3 shadow-sm border border-gray-200">
      <button class="outline-none focus:outline-none"><i class="fas fa-search h-4"></i></button>
      <input type="text" wire:model="search" placeholder="busque um serviço" class="w-full pl-4 outline-none focus:outline-none bg-transparent rounded-md"> 
      <button class="outline-none focus:outline-none" wire:click="$set('search', '')"><i class="fas fa-times h-4"></i></button>     
    </div>

    <a type="button"                              
        href="{{ route('service.create') }}"
        class="block w-52 items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:shadow-outline-green disabled:opacity-25 transition ease-in-out duration-150">
        <i class="fas fa-plus mr-1"></i> Cadastrar novo
    </a>
    
    
    <div wire:loading class='block mt-5'>
        <i class="fas fa-spinner fa-pulse fa-5x"></i>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-7 mt-5" wire:loading.class="invisible">
        @foreach ($services as $service)
          <div class="flex flex-wrap bg-white rounded-lg border-l-8 border-blue-800 w-full">
            <div class="rounded-lg w-full">          
              <div class="w-full p-4">
                <div class='relative'>
                  <h2 class="font-bold text-2xl text-blue-700 inline">{{$service->name}}</h2>
                  <a href="" class='absolute top-2 right-2'><i class="fas fa-pencil-alt text-blue-300 float-right"></i></a>
                </div>
                <div class="py-2 text-sm text-gray-400">
                    <p class="mt-1">
                      <i class="fas fa-phone-alt mr-1"></i> {{ $service->phone }}
                    </p>                  
                    <p class="mt-1">
                      <i class="fas fa-email mr-1"></i> {{ $service->email }}
                    </p>                  
                    <p class='mt-1'>
                      <i class="fas fa-map-marker-alt mr-1"></i> {{ $service->city }}
                    </p>
                </div>
              </div>
            </div>
  
            <div class='w-full p-4 pt-1'>
              <p>
                <label for="" class="font-bold"> Palavras-chave:</label> 
                @foreach ($service->tags as $tag)
                  <span >{{ $tag->name }}</span>     
                @endforeach
              </p>
            </div>
  
            <div class="p-4 flex space-x-4 self-end w-full">
              <a href="#" class="w-1/2 px-4 py-3 text-center bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-black font-bold rounded-lg">
                <i class="fas fa-thumbs-down"></i>
              </a>
              <a href="#" class="w-1/2 px-4 py-3 text-center text-blue-100 bg-blue-800 rounded-lg hover:bg-blue-700 hover:text-white font-bold">
                <i class="fas fa-thumbs-up"></i>
              </a>
            </div>
          </div>          
        @endforeach
    </div>
</div>
