<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name;
    public $city;
    public $phone;
    public $email;
    public $keywords;
    
    protected $rules = [
        'name' => 'required|min:3',        
        'city' => 'required|min:3',   
        "phone" => "required|min:8",                        
        "email" => "nullable|email",       
        "keywords" => "required"                 
    ];

    public function render()
    {
        return view('livewire.service.create');
    }

    public function submit()
    {
        $this->validate();
        $phoneClean = Str::of($this->phone)->trim()->replace(['-', '+55', ' '], '');        

        $service = Service::create([
            'name' => $this->name,
            'email' => $this->email,
            'city' => $this->city,
            'phone' => $phoneClean,
            'user_id' => auth()->user()->id
        ]);
        
        $keywords = Str::of($this->keywords)->trim()->lower()->explode(' ');
        $service->attachTags($keywords);

        session()->flash('success', 'Serviço cadastrado com sucesso.');
        $this->reset();
    }
}
