@extends('layout.main')

@section('section')

<section id="login-page" class="py-8 bg-slate-800">
    <div class="container py-16 px-4 mx-auto text-center">
        <div class="mx-auto text-center">
            <h4 class="font-semibold uppercase text-primary text-sm lg:text-lg">Artikel</h4>
            <h2 class="font-bold text-slate-50 text-2xl mb-3 lg:text-3xl">{{ $title }}</h2>
        </div>
        <div class="flex flex-wrap gap-5 justify-center">
            @if(!empty($posts->count()))
            @foreach($posts as $p)
            <div class="max-w-[300px] bg-white">
                <img src="{{ asset('storage/' . $p->image) }}" width="300" height="150" alt="Programming"
                    class="min-w-[300px] max-h-[150px] object-cover mb-3" loading="lazy">
                <a href="/article/{{ $p->slug }}"
                    class="block font-semibold text-xs text-dark lg:text-sm hover:text-primary mb-2 px-3">
                    <h3>{{ $p->title }}</h3>
                </a>
                <p class="text-xs text-slate-800 mb-2 px-3">{{ $p->excerpt }}</p>
                <a href="/article/{{ $p->slug }}"
                    class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-primary text-white self-center mb-3">Baca
                    Selengkapnya</a>
            </div>
            @endforeach
            @else
            <p class="py-5">- Data Tidak Ditemukan! -</p>
            @endif
        </div>
        <div class="flex justify-center mt-5">
            {{ $posts->links() }}
        </div>
    </div>
</section>

@endsection