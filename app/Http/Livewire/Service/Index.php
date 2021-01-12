<?php

namespace App\Http\Livewire\Service;

use Spatie\Tags\Tag;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{
    public $services;
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        $query = Service::selectRaw('services.*, SUM(recommended) as likes')
            ->leftJoin('reactions', 'service_id', 'services.id')->groupBy('services.id')->orderBy('likes', 'desc');

        if ($this->search) {
            $searchClean = Str::of($this->search)->lower();
            $tags = Str::of($searchClean)->trim()->explode(' ');
            $query = $query->join('taggables', 'taggable_id', '=', 'services.id' )->join('tags', 'taggables.tag_id', '=', 'tags.id');
            foreach ($tags as $tag) {
                $query->orWhere('tags.name', 'LIKE', "%$tag%");
                $query->orWhere('services.name', 'LIKE', "%$tag%");
            }
            $this->services = $query->distinct()->get();
        } else {
            $this->services = $query->get();
        }
        return view('livewire.service.index');
    }
}
