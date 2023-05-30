<div class="text-center mt-6 mx-40 " >
    <div>
        @foreach ($datas as $data)
            <p>{{$data->id}}</p>
            <p class="border border-solid border-black my-2 cursor-pointer
               {{$active == $data->id ? 'bg-blue-200' : ''}}"
               wire:click="$emit('dataShared',{{$data->id}})">{{ $data->question }}</p>
        @endforeach
    </div>
</div>
