<?php

namespace App\Livewire;

use App\Models\Names;
use Livewire\Component;

class Search extends Component
{
    public $searchtext='';

    public $search_output;

            // // This method is triggered every time the searchtext property is updated
            // public function updatedSearchtext()
            // {
            //     $this->performSearch();
            // }

            // public function performSearch()
            // {
            //     // Fetch the results from the model based on the search text
            //     $this->search_output = Names::search($this->searchtext)->get();
            // }

            // public function search_input(){

            //     $data = Names::search($this->searchtext)->get();

            //     $this->search_output = $data;

            // }

    public function updated($property)
    {
        // $property: The name of the current property that was updated

        if ($property === 'searchtext' && !empty($this->searchtext)) {

            // $this->search_output = Names::search($this->searchtext)->get();

            $this->search_output = Names::search($this->searchtext)->orderBy('name', 'asc')->take(5)->get()->map(function ($post) {
                // Replace the search text with the highlighted version in a case-insensitive way
                $highlighted = '<b class="text-red-600">' . e($this->searchtext) . '</b>';

                $post->name = str_ireplace($this->searchtext, $highlighted, e($post->name));
                $post->description = str_ireplace($this->searchtext, $highlighted, e($post->description));

                return $post;
            });


        }else{

            $this->search_output = null;

        }
    }



    public function render()
    {
        return view('livewire.search');
    }
}
