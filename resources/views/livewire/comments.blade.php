<div>
    <div  class="flex  flex-col items-center mt-32 font-bold ">
       
        <form class="my-4 flex flex-col" wire:submit.prevent="add">

            <input  type="file" wire:model="photo" >
        <div wire:loading wire:target="photo">Uploading...</div>
            @if ($photo)
            Photo Preview:
            <img src="{{ $photo->temporaryUrl() }}" width="200">
        @endif
            <div class="flex">
                <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind."
                wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
            </div>
            </div>
    </form>
    <div class="mr-20">
        @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    @if (session()->has('message'))
    <div x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false, 3000) "
     class="p-1 bg-green-300 text-green-800 mr-14">
        {{ session('message') }}
    </div>
@endif 
    </div>
    
    <div class="font-bold text-center mt-16 md:grid md:grid-cols-2 lg:grid-cols-4 border border-blue-950 py-4  md:mx-28 bg-g rounded-lg" >
        
        @foreach ($comments as $comment)
          
        <div class="md:px-14 border   border-solid bg-blue-200 " >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} 
            stroke="currentColor" class="w-6 h-6  float-right cursor-pointer hover:scale-125  bg-purple-200"
            wire:click="remove({{$comment->id}})">
                <path strokeLinecap="round" strokeLinejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
                       
            <h1 class=" bg-purple-500 text-white" >{{ $comment->id }}</h1>
            <h2 lass="font-serif font-bold">{{ $comment->name }}</h2>
            @if ($comment->image)
            <img src="{{ Storage::url('img/'.$comment->image)}}" width="100" />
            @endif
        </div>
        @endforeach
       
    </div>
    <div class="md:mx-32 mt-3 max-md:flex max-md:justify-center">
        {{ $comments->links() }}
    </div>
</div >

