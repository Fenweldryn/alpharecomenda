<div>
    <div class="p-4 flex space-x-4 self-end w-full">
        <button type="button" wire:click="dislike" wire:loading.attr="disabled" class="w-1/2 px-4 py-3 text-center bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-black font-bold rounded-lg disabled:opacity-50 disabled:cursor-default">
            <span>{{ $dislikes }}</span><i class="ml-2 fas fa-thumbs-down"></i>
        </button>
        <button type="button" wire:click="like" wire:loading.attr="disabled" class="w-1/2 px-4 py-3 text-center text-blue-100 bg-blue-800 rounded-lg hover:bg-blue-700 hover:text-white font-bold disabled:opacity-50 disabled:cursor-default">
            <span>{{ $likes }}</span><i class="ml-2 fas fa-thumbs-up"></i>
        </button>
    </div>
</div>
