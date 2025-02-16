<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormCrearArticle extends Form
{
    #[Rule(['required', 'string', 'min:3', 'max:100', 'unique:articles, title'])]
    public string $title = "";
    #[Rule(['required', 'string', 'min:10', 'max:300'])]
    public string $content = "";
    #[Rule(['required', 'exists:tags,id'])]
    public int $tag_id = -1;


    public function formstore(){
        $this->validate();
        Article::create([
            'title'=>$this->title,
            'content'=>$this->content,
            'tag_id'=>$this->tag_id,
            'user_id'=>Auth::id()
        ]);
    }

    public function formReset(){
        $this->reset();
    }
}
