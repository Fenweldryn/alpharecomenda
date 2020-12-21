<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use Spatie\Tags\Tag;

class Index extends Component
{
    public $services;
    public $search;
    // protected $queryString = ['search'];

    public function render()
    {
        if ($this->search) {
            $this->search = Str::of($this->search)->lower();
            $tags = Str::of($this->search)->trim()->explode(' ');
            $query = Service::select('services.*')->join('taggables', 'taggable_id', '=', 'services.id' )->join('tags', 'taggables.tag_id', '=', 'tags.id');
            foreach ($tags as $tag) {
                $query->orWhere('tags.name', 'LIKE', "%$tag%");
                $query->orWhere('services.name', 'LIKE', "%$tag%");
            }
            $this->services = $query->distinct()->get();
        } else {
            $this->services = Service::all();
        }
        return view('livewire.service.index');
    }
}
