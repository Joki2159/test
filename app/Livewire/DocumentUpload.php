<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Document;

class DocumentUpload extends Component
{
    use WithFileUploads;

    public $title;
    public $pdf;

    public function upload()
    {
        $this->validate([
            'title' => 'required',
            'pdf' => 'required|mimes:pdf|max:10240'
        ]);

        $filename = $this->pdf->store('documents', 'public');

        Document::create([
            'title' => $this->title,
            'filename' => $filename
        ]);

        $this->reset(['title', 'pdf']);
        session()->flash('message', 'Dokument uspješno spremljen.');
        $this->dispatch('documentUploaded');
    }

    public function render()
    {
        return view('livewire.document-upload');
    }
}
