<x-layout>
  <x-card class="p-10 max-w-6xl mx-auto mt-24">

    <header class="text-center">
      <h2 class="text-2xl font-semibold  uppercase mb-4">Write an Article</h2>
    </header>


    <div class="w-full max-w-full  pl-10">
      <form method="POST" action="/article" class="w-full max-w-full mb-6 pd-6" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="title" class="inline-block text-lg mb-2">Title </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title')}}" />

          @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>


        <div class="mb-6">
          <label for="body" class="inline-block text-lg mb-2">Body</label>
      
          <textarea class="border border-gray-200 rounded p-2 w-full" name="body" id="body" cols="40" rows="10">
            {{old('body')}}
            </textarea>

          @error('body')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>



        <div class="mb-6">
          <label for="thumbnail" class="inline-block text-lg mb-2">
            Photo
          </label>
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="thumbnail" />

          @error('thumbnail')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>


        <div class="mb-6">
          <button class="bg-laravel bg-blue-500 text-white rounded py-2 px-4 hover:bg-black">
            Submit
          </button>

          <a href="/" class="text-black ml-4"> Back </a>
        </div>

      </form>

    </div>
  </x-card>
</x-layout>


<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

