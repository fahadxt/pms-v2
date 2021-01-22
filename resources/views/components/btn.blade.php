<div>
    <button {{ $attributes->merge([
        'class' => 'inline-flex items-center mx-2 component border border-transparent focus:outline-none rounded-md font-semibold tracking-widest text-xs px-4 py-3 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150',
        ]) 
    }}>
        {{ $slot }}
    </button>
</div>
