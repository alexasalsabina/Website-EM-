@props(['href' => '#', 'image' => null, 'date' => null, 'title', 'excerpt'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'article-card', 'data-page-animate' => '']) }}>
    @if($image)
        <div class="article-card__media">
            <img src="{{ asset($image) }}" alt="{{ $title }}" loading="lazy" />
        </div>
    @endif

    <div class="article-card__content">
        @if($date)
            <span class="article-card__date">{{ $date }}</span>
        @endif

        <h3 class="article-card__title">{{ $title }}</h3>
        <p class="article-card__excerpt">{{ $excerpt }}</p>
    </div>
</a>
