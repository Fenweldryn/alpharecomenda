<?php

namespace App\Http\Livewire;

use App\Models\Reaction;
use App\Models\Service;
use Livewire\Component;

class ReactionButtons extends Component
{
    public $likes;
    public $dislikes;
    public Service $service;

    public function mount(Service $service)
    {   
        $this->service = $service;        
    }

    public function render()
    {
        $this->likes = $this->service->reaction()->where('recommended', true)->count();
        $this->dislikes = $this->service->reaction()->where('recommended', false)->count();
        return view('livewire.reaction-buttons');
    }

    public function like()
    {
        $this->service->like();
    }

    public function dislike()
    {
        $this->service->dislike();
    }
}
