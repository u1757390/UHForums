@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    The University Of Huddersfield Forums
                </header>
                <div class="p-10 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                    @foreach($forums as $f)
                        <a href="{{ $f -> path}}">
                            <div class="rounded overflow-hidden shadow-lg">
                                <div class="px-4 py-2">
                                    <div class="font-bold text-xl mb-2">
                                        <div class="text-center text-black font-bold text-xl mb-2">
                                            {{ $f -> forumname }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
