<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $keywords;
    public Service $service;
    public bool $showDeleteConfirm;

    protected $rules = [
        'service.name' => 'required|min:3',
        'service.city' => 'required|min:3',
        "service.phone" => "required|min:8",
        "service.email" => "nullable|email",
        "keywords" => "required"
    ];
    
    public function mount(Service $service)
    {
        $this->service = $service;
        $this->showDeleteConfirm = false;
        $this->keywords = $service->tags->pluck('name')->implode(' ');
    }

    public function render()
    {
        return view('livewire.service.edit');
    }

    public function submit()
    {
        $this->validate();
        $phoneClean = Str::of($this->service->phone)->trim()->replace(['-', '+55', ' '], '')->__toString();        

        $this->service->update([
            'name' => $this->service->name,
            'email' => $this->service->email,
            'city' => $this->service->city,
            'phone' => $phoneClean
        ]);

        $keywords = Str::of($this->keywords)
            ->trim()
            ->lower()
            ->replace([',', '.'], '')            
            ->replace([' - ', '-'], ' ')            
            ->replace([' de ', ' da ', ' e ', ' a '], ' ')            
            ->explode(' ');        
        $this->service->syncTags($keywords);

        session()->flash('success', 'Serviço editado com sucesso.');
    }

    public function showDeleteConfirm($show)
    {
        $this->showDeleteConfirm = $show;
    }

    public function delete()
    {
        $this->service->delete();
        session()->flash('success', 'serviço excluído com sucesso.');
        return redirect()->to('/servicos');
    }
}
