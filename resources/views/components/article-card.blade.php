<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{$article->thumbnail ? asset('storage/' . $article->thumbnail) : asset('/images/no-image.png')}}"
            alt="" />
        <div>
            <h3 class="text-xl font-bold mb-4">
                <a href="/article/{{$article->id}}">{{$article->title}}</a>
            </h3>
      
            <div class="text-lg mt-4">
                <i class="fa-solid "></i> {{\Illuminate\Support\Str::limit($article->body,50)}}
            </div>
        </div>
    </div>
</x-card>