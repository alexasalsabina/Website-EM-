@props(['href' => '#', 'label' => null, 'title', 'description'])

<a href="{{ $href }}" class="feature-card" data-page-animate>
    <div class="feature-card__icon">
        {{ $slot }}
    </div>
    <div class="feature-card__content">
        @if($label)
            <p class="feature-card__label">{{ $label }}</p>
        @endif
        <h3 class="feature-card__title">{{ $title }}</h3>
        <p class="feature-card__description">{{ $description }}</p>
    </div>
</a>
