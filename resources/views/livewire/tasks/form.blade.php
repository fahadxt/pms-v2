<div>
    <x-btn class="text-white bg-{{$btn_color}}-600  hover:bg-{{$btn_color}}-700" wire:click="toggleModal">
        {{ __($btn_name) }}
    </x-btn>
    
    <x-jet-dialog-modal wire:model="modal" maxWidth="2xl"> 

        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            @include('livewire.tasks.content-form')
        </x-slot>
      
        <x-slot name="footer">
            <div class="flex">
                <x-btn class="text-white bg-green-600  hover:bg-green-700 " wire:click="store" wire:loading.attr="disabled">
                    {{__('Save')}}
                    <i class="fas fa-check"></i>
                </x-btn>
                <x-btn class="text-black bg-white" wire:click="$toggle('modal')" wire:loading.attr="disabled">
                    {{__('Nevermind')}}
                </x-btn>
            </div>
        </x-slot>

    </x-jet-dialog-modal>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#assigned_to').dropdown();
            $('#assigned_to').on('change', function (e) {
                @this.set('assigned_to', e.target.value);
            });
        });
    </script>
@endpush