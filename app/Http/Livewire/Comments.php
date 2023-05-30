<?php

namespace App\Http\Livewire;

use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use App\Models\Comment;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Storage;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $newComment;
    public $photo;
    public $data_id = 1 ;
    public $user_id = 1;
    
  
    
    protected $listeners = ['dataShared'];
    public function dataShared($data_id)
    {
        $this->data_id = $data_id;
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,['newComment' => 'required|max:50']);
    }
    public function remove($commentID){
        $comment = Comment::find($commentID);
        Comment::destroy($commentID) ;
        if($comment->image){
        Storage::delete('public/img/'.$comment->image); 
        }

        session()->flash('message', 'comment successfully deleted.');

    }

    public function add()
    {
        if($this->photo){
            $name = md5($this->photo . microtime()).'.'.$this->photo->extension();
            $this->photo->storeAs('public/img', $name);
        }else{
            $name = null ;
        }
        
        $this->validate(['newComment' => 'required|max:50']);
        Comment::create(['name' => $this->newComment , 
          'image' => $name,
          'data_share_id' => $this->data_id,
          'user_id' => $this->user_id,

            ]);
        $this->newComment = '';
        session()->flash('message', 'comment successfully added.');
    }

   

    public function render()
    {
        return view('livewire.comments',[
        'comments' => Comment::where('data_share_id', $this->data_id)->latest()->paginate(10)

        ]);
    }
}
