<x-layout>
  <x-card class="p-10 max-w-6xl mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Edit Article</h2>
      <p class="mb-4 font-bold">Edit: {{$articles->title}}</p>
    </header>

    <form method="POST" action="/article/edit/{{$articles->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Title</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
          value="{{$articles->title}}" />

        @error('articles')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6 flex flex-col">
        <label for="body" class="inline-block text-lg mb-2">Body</label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="body" id="body" cols="40" rows="10">
          {{$articles->body}}
        </textarea>
 


        @error('body')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="thumbnail" class="inline-block text-lg mb-2">
          Thumbnail
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

        <img class="w-48 mr-6 mb-6"
          src="{{$articles->thumbnail ? asset('storage/' . $articles->thumbnail) : asset('/images/no-image.png')}}"
          alt="" />

        @error('thumbnail')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
  

      <div class="mb-6">
        <button class="bg-lime-700 text-white rounded py-2 px-4 hover:bg-black">
          Update Article
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>