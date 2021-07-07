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
                   Subforum: {{$messages[0] -> subforumname}}
                </header>
                <div class="w-full p-6">
                    @foreach($messages as $m)
                            <div class="w-full lg:w-1/2 p-3">
                                <div class="rounded overflow-hidden lg:h-32 border shadow shadow-lg">
                                    <div href="" class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4">
                                        <a class="text-left text-black font-semibold text-xl mb-2">
                                            {{ $m -> name }}
                                        </a>
                                        <p class="text-grey-darker text-base">{{ $m -> message }}</p>
                                    </div>
                                </div>
                        </div>
                    @endforeach

                        <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" method="post" action="{{$messages[0] -> path}}">
                            {{ csrf_field() }}
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <textarea class="rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="message" placeholder='Type Your Comment' required></textarea>
                                </div>
                                <input name="userid" type="hidden" value={{$id = Auth::id()}} />
                                <input name="subforumid" type="hidden" value={{$messages[0] -> userid}} />
                                <div class="w-full md:w-full flex items-start md:w-full px-3">
                                    <div class="-mr-1">
                                        <button type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">
                                        Submit Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </section>
        </div>
    </main>
@endsection
