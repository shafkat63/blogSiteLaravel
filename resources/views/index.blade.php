<x-layout>
    @if (!Auth::check())
      @include('partials._hero')
    @endif
  
    @include('partials._search')
  
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
  
      @unless(count($articles) == 0)
  
      @foreach($articles as $article)
      <x-article-card :article="$article" />
      @endforeach 
  
      @else
      <p>No article found</p>
      @endunless
  
    </div>
  
    <div class="mt-6 p-4">
    {{$articles->links()}} 
    </div>
  </x-layout>
  