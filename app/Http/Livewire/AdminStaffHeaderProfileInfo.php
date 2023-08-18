<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Staff;

use Illuminate\Support\Facades\Auth;

class AdminStaffHeaderProfileInfo extends Component
{
    public $admin;
    public $listeners = [
        'updateAdminStaffHeaderInfo' => '$refresh'
    ];

    public function mount()
    {
        if (Auth::guard('admin')->check()) {
            $this->admin = Admin::findOrFail(auth()->id());
        }
    }

    public function render()
    {
            return view('admin.livewire.admin-staff-header-profile-info');
    }
}
