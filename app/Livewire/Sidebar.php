<?php

// namespace App\Livewire\Components;
namespace App\Livewire;

use App\Models\User;
use App\Models\Document;
use Livewire\Component;


class Sidebar extends Component
{
    public $shrink = false;
    public $drawer = false;

    public $query;
    public $results;

    public $documents;

    public function mount()
    {
        $this->documents = Document::all();
    }

    public function updatedQuery($query)
    {
        if ($query === '') {
            $this->results = null;
            return;
        }

        $this->results = User::where('username', 'like', '%' . $query . '%')
            ->orWhere('name', 'like', '%' . $query . '%')
            ->get();
    }

    public function selectDocument($id)
    {
        $this->dispatch('documentSelected', id: $id);
    }

public function render()
{
    return view('layouts.sidebar', [
        'documents' => $this->documents,
    ]);
}
}
