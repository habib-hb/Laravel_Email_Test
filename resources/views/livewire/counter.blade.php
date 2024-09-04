<div>
    <h1>{{ $count }}</h1>

    <button wire:click="increment">+</button>

    <button wire:click="decrement">-</button>

        <!-- Loading Indicator -->
        <div wire:loading>
            Processing...
        </div>
        
</div>
