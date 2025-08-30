<div class="p-4">
    @if (session()->has('message'))
        <div class="text-green-500">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="upload">
        <input type="text" wire:model="title" placeholder="Naslov" class="border p-2 w-full mb-2">
        <input type="file" wire:model="pdf" class="mb-2">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Spremi</button>
    </form>
</div>

