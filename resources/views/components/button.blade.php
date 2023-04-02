<button class="btn btn-primary bg-primary" {{ $attributes->merge(['type' => 'submit']) }}>
    {{ $slot }}
</button>
