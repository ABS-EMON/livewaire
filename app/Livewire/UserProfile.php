<?php

namespace App\Livewire;

use Livewire\Component;

class UserProfile extends Component
{
    public $userId;
    public $userName = "Guest";

    public function mount($userId = null,$defaultName = "Guest")
    
    {

        $this->userId = $userId;
       
        if ($userId) {
            $this->userName = "User " .$defaultName;
        } else {
            $this->userName = $defaultName;
        }
       
    }
    public function render()
    {
        return view('livewire.user-profile');
    }
}