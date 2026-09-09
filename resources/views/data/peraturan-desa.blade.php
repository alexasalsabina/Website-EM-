@extends('layouts.app')

@section('title', 'Peraturan Desa')

@section('content')
<style>
	.peraturan-page { min-height: 100vh; padding: 7rem 1.5rem 5rem; background: linear-gradient(180deg, #09233d 0%, #12395a 55%, #12395a 100%); }
	.peraturan-wrap { max-width: 1180px; margin: 0 auto; }
	.peraturan-heading { margin-bottom: 2.5rem; color: #fff; }
	.peraturan-heading h1 { margin: 0 0 .5rem; font-size: clamp(2rem, 4vw, 3.4rem); font-weight: 800; }
	.peraturan-heading p { margin: 0; color: #dce8f2; }
	.peraturan-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1.25rem; }
	.peraturan-card { overflow: hidden; border: 1px solid rgba(255,255,255,.18); border-radius: 22px; background: #274b68; color: #fff; box-shadow: 0 18px 35px rgba(4, 20, 36, .18); }
	.peraturan-card-top { display: flex; align-items: center; justify-content: center; min-height: 170px; margin: 1rem; border-radius: 18px; background: #eff7fd; color: #102b45; font-size: 4rem; }
	.peraturan-card-body { padding: 0 1.25rem 1.35rem; }
	.peraturan-year { display: inline-block; padding: .35rem .75rem; border-radius: 999px; background: #55738b; color: #eef7ff; font-size: .75rem; font-weight: 700; }
	.peraturan-card h2 { margin: .8rem 0 .5rem; font-size: 1.25rem; }
	.peraturan-card p { min-height: 4.5rem; margin: 0; color: #e1edf5; line-height: 1.55; }
	.peraturan-link { display: inline-block; margin-top: 1rem; color: #fff; font-weight: 700; text-decoration: none; }
	.peraturan-empty { grid-column: 1 / -1; padding: 4rem; border-radius: 20px; background: #fff; color: #657383; text-align: center; }
	@media (max-width: 850px) { .peraturan-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
	@media (max-width: 560px) { .peraturan-page { padding-top: 5rem; } .peraturan-grid { grid-template-columns: 1fr; } }
</style>

<div class="peraturan-page">
	<div class="peraturan-wrap">
		<header class="peraturan-heading">
			<h1>Peraturan Desa</h1>
		</header>

		<div class="peraturan-grid">
			@forelse($peraturans as $peraturan)
				<article class="peraturan-card">
					<div class="peraturan-card-top">📜</div>
					<div class="peraturan-card-body">
						<span class="peraturan-year">{{ $peraturan->tahun }}</span>
						<h2>{{ $peraturan->judul }}</h2>
						<p>{{ \Illuminate\Support\Str::limit($peraturan->isi, 150) }}</p>
						<a class="peraturan-link" href="{{ route('data.peraturan-desa.show', $peraturan) }}">Baca selengkapnya &rarr;</a>
					</div>
				</article>
			@empty
				<div class="peraturan-empty">Belum ada peraturan desa yang tersedia.</div>
			@endforelse
		</div>
	</div>
</div>
@endsection