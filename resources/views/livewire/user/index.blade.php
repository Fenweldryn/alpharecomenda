<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}             
        </h2>
    </x-slot>

    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
        <table class="mb-3">
            <thead>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Nome</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Email</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Condomínio</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Lote/Casa</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Aprovado em</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Cadastrado em</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Ação</th>
            </thead>
            <tbody class="bg-white">
                @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->id }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->condominio }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->casa }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->approved_at }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $user->created_at }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        @if (!$user->approved_at)
                        <button class=" px-4 py-3 text-center text-blue-100 bg-blue-800 rounded-lg hover:bg-blue-700 hover:text-white font-bold disabled:opacity-50 disabled:cursor-default" wire:click="approve({{ $user->id }})">Aprovar</button>                            
                        @endif
                    </td>
                </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
