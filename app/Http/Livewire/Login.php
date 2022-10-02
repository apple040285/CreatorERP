<?php

namespace App\Http\Livewire;

use App\Models\Staff;
use Livewire\Component;

class Login extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    public $account;

    public $password;

    public function login()
    {
        if (!$staff = Staff::where('code', $this->account)->first()) {
            $this->alert('error', '登入失敗, 請輸入正確的代號');
            return;
        }

        auth('staff')->login($staff);

        if (auth('staff')->user()->code === $staff->code) {
            $this->alert('success', 'OK');
            return;
        }

        auth('staff')->logout();
        $this->alert('error', '登入失敗');
    }

    public function render()
    {
        return view('livewire.login')
            ->extends('layouts.main');
    }
}
