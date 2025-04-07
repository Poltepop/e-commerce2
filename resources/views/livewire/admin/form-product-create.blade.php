<div>
    {{ $productRequest->status }}
    <br>
    <input type="text" wire:model.live='productRequest.status'>
    <button wire:confirm='hello' wire:click='create'>create</button>
</div>
