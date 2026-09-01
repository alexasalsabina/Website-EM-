@props(['eyebrow' => null, 'title', 'subtitle' => null, 'note' => null])

<div class="section-heading" data-page-animate>
    @if($eyebrow)
        <p class="section-heading__eyebrow">{{ $eyebrow }}</p>
    @endif

    <h1 class="section-heading__title">{{ $title }}</h1>

    @if($subtitle)
        <p class="section-heading__subtitle">{{ $subtitle }}</p>
    @endif

    @if($note)
        <p class="section-heading__note">{{ $note }}</p>
    @endif

    {{ $slot }}
</div>
