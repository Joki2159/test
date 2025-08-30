<div class="space-y-2">
    @foreach ($documents as $doc)
        <div wire:click="selectDocument({{ $doc->id }})"
             class="cursor-pointer hover:bg-gray-200 p-2 rounded">
            {{ $doc->title }}
        </div>
    @endforeach
</div>
