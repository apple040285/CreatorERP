<?php

namespace App\Http\Livewire;

use App\Models\PMember;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    public $account;

    public $password;

    public function login()
    {
        if (!$member = PMember::where('email', $this->account)->first()) {
            $this->alert('error', '登入失敗, 請輸入正確的帳號');
            return;
        }

        if (!$staff = $member->staff) {
            $this->alert('error', '登入失敗, 該帳號尚未綁定員工');
            return;
        }

        if (!$storehouse = $member->storehouse) {
            $this->alert('error', '登入失敗, 該帳號尚未綁定倉庫');
            return;
        }

        if (!Hash::check($this->password, $member->password)) {
            $this->alert('error', '登入失敗, 請輸入正確的密碼');
            return;
        }

        auth('staff')->login($staff);

        $this->flash('success', '登入成功', [], route('index'));
    }

    public function render()
    {
        return view('livewire.login')
            ->extends('layouts.main');
    }
}
