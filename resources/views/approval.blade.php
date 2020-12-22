<x-guest-layout>
    <div class='flex justify-center'>
       

        <x-slot name="header">
        </x-slot>
    
        <div class="h-screen flex items-center">
            <div class="text-center">
                <div class='block text-center text-5xl leading-10 md:leading-none md:text-6xl'>
                    <i class="far fa-thumbs-up text-blue-800"></i>           
                    <a href="{{url('')}}" class="font-extrabold text-blue-800 flex justify-center">Alpha Recomenda</a>                                 
                </div>  
                <div class="mt-7">
                    <div class="card">
                        <div class="header font-semibold text-xl text-gray-800 leading-tight"><i class="far fa-clock"></i> Aguardando Aprovação</div>
                        <div class="card-body mt-2">
                            Seu cadastro está aguardando aprovação do administrador.
                            <br />
                            Por favor, tente novamente mais tarde.
                            <x-jet-dropdown-link class="mt-5" href="{{ url('') }}">
                                <i class="fas fa-home mr-1"></i>{{ __('Página inicial') }}
                            </x-jet-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt mr-1"></i>{{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>