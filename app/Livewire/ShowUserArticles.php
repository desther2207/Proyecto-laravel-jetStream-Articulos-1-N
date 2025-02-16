<?php

namespace App\Livewire;

use App\Livewire\Forms\FormUpdateArticle;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUserArticles extends Component
{
    use WithPagination;

    public string $campo = "id", $orden = "desc";
    public string $buscar = "";

    public FormUpdateArticle $uform;
    public bool $openUpdate = false;

    public function render()
    {
        $articles = Article::with('tag')
        ->where('user_id', Auth::id())
        ->where(function($query){
            $query->where('title', 'like', "%{$this->buscar}%")
                ->orwhere('content', 'like', "%{$this->buscar}%");
        })
        ->orderBy($this->campo, $this->orden)
        ->paginate(5);

        $tags = Tag::all();
        return view('livewire.show-user-articles', compact('articles', 'tags'));
    }

    public function ordenar(string $campo){
        $this->orden = ($this->orden=='asc') ? 'desc' : 'asc';
        $this->campo=$campo;
    }

    //Metodo para borrar
    public function confirmarDelete(Article $article){
        $this->authorize('delete', $article);
        $this->dispatch('onBorrarArticle', $article->id);
    }

    //Borrar de verdad
    #[On('borrarOk')]
    public function delete(Article $article){
        $this->authorize('delete', $article);
        $article->delete();
        $this->dispatch('mensaje', 'Article eliminado');
    }

    //Para editar

    public function edit(Article $article){
        $this->authorize('update', $article);
        $this->uform->setArticle($article);
        $this->openUpdate = true;
    }

    public function update(){
        $this->authorize('update', $this->uform->article);
        $this->uform->formUpdate();
        $this->cancelar();
        $this->dispatch('mensaje', 'Article editado');
    }

    public function cancelar(){
        $this->openUpdate = false;
        $this->uform->formReset();
    }
}
