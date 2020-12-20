<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class='text-center text-5xl leading-10 md:leading-none md:text-6xl'>
                <i class="far fa-thumbs-up text-blue-800"></i>           
                <a href="{{url('')}}" class="font-extrabold text-blue-800 flex justify-center">Alpha Recomenda</a>                                 
            </div> 
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            <h1 style="font-size: 2em;" class="mb-3">Cadastro</h1>            
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="condominio" value="{{ __('Condomínio') }} " />
                <select id="condominio" class="form-input rounded-md shadow-sm block mt-1 w-full" type="condominio" name="condominio" required>
                    <option value=""></option>
                    <option value="Alpha 1">Alpha 1</option>
                    <option value="Alpha 2">Alpha 2</option>
                    <option value="Alpha 3">Alpha 3</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="casa" value="{{ __('Lote/Casa') }}" />
                <x-jet-input id="casa" class="block mt-1 w-full" type="casa" name="casa" :value="old('casa')" required placeholder="i2-10"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }} (8 dígitos)" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }} (8 dígitos)" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
