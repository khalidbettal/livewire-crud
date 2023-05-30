<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShareData extends Component
{
    public $active;
    protected $listeners = ['dataShared'];
    public function dataShared($data_id)
    {
        $this->active = $data_id;
    }
    public function render()
    {
        return view('livewire.share-data', [
            'datas' => \App\Models\Data_share::all()
        ]);
    }
}
