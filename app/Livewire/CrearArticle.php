<?php

namespace App\Livewire;

use App\Livewire\Forms\FormCrearArticle;
use App\Models\Tag;
use Livewire\Component;

class CrearArticle extends Component
{

    public bool $openCrear = false;

    public FormCrearArticle $cform;


    public function render()
    {
        $tags = Tag::all();
        return view('livewire.crear-article', compact('tags'));
    }

    public function store(){
        $this->cform->formstore();
        $this->cancelar();
        $this->dispatch('onArticleCreado')->to(ShowUserArticles::class);
        $this->dispatch('mensaje','Article creado');
        return redirect()->route('showuserarticles');
    }

    public function cancelar(){
        $this->openCrear=false;
        $this->cform->formReset();
    }
}
