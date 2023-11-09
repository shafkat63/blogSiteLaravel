<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <h1 class="text-2xl mb-2 font-bold">
                    {{$article->title}}
                </h1>
                <img class="w-48 mr-6 mb-6"
                    src="{{$article->thumbnail ? asset('storage/' . $article->thumbnail) : asset('/images/no-image.png')}}"
                    alt="" />


                <div class="text-sm font-thic mb-4">

                    <p class="font-medium p-4"> {{$article->body}}</p>
                </div>

        </x-card>
        {{-- {{dd($article->user_id=== auth()->user()->id)}} --}}
        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/article/edit/{{$article->id}}">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/article/{{$article->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-card>
    </div>
</x-layout>