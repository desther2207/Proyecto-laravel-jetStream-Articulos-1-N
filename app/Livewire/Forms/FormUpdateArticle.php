<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormUpdateArticle extends Form
{

    public ?Article $article = null;


    public string $title = "";
    #[Rule(['required', 'string', 'min:10', 'max:300'])]
    public string $content = "";
    #[Rule(['required', 'exists:tags,id'])]
    public int $tag_id = -1;


    public function setArticle(Article $article){
        $this->article = $article;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->tag_id = $article->tag_id;
    }

    public function formUpdate(){
        $this->validate();
        $this->article->update([
            'title'=>$this->title,
            'content'=>$this->content,
            'tag_id'=>$this->tag_id,
        ]);
    }

    public function formReset(){
        $this->reset();
    }

    public function rules(){
        return [
            'title'=>['required', 'string', 'min:5', 'max:100', 'unique:articles,title,'.$this->article->id]
        ];
    }
}
