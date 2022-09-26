<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class AccountDetail extends Component
{
    public $firstName; // initial first name state
    public $first_name; // dirty first name state

    public $lastName; // initial last name state
    public $last_name; // dirty last name state

    public $emailAddress; // initial email address state
    public $email; // dirty email state

    public $contactNumber; // initial contact number state
    public $contact_number; // dirty contact number state

    public $oldAddress; // initial address state
    public $address; // dirty address state

    public $updatedProperty;

    public function mount(User $user)
    {
        $this->userId = $user->id;

        $this->init($user); // initialize the component state
    }

    public function updated($propertyName)
    {
        $this->updatedProperty = $propertyName;
    }

    public function save()
    {
        $user = User::findOrFail($this->userId);

        if( $this->updatedProperty ){
            $validatedData = $this->validate([
                $this->updatedProperty => $this->rules($this->updatedProperty, $user)
            ]);

            $data = (string) Str::of($this->{$this->updatedProperty})->trim()->substr(0, 1000);

            $user->{$this->updatedProperty} = $data;
            $user->save();
        }

        $this->init($user); // re-initialize the component state with fresh data after saving
    }

    private function init(User $user)
    {
        $this->firstName = $user->first_name;
        $this->first_name = $this->firstName;

        $this->lastName = $user->last_name;
        $this->last_name = $this->lastName;

        $this->emailAddress = $user->email;
        $this->email = $this->emailAddress;

        $this->contactNumber = $user->contact_number;
        $this->contact_number = $this->contactNumber;

        $this->oldAddress = $user->address;
        $this->address = $this->oldAddress;
    }

    private function rules($attribute, $entity)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$entity->id],
            'contact_number' => ['required', 'digits:11', 'regex:/(09)[0-9]{9}/', 'numeric', 'unique:users,contact_number,'.$entity->id],
            'address' => ['required', 'max:1000']
        ];

        return isset($rules[$attribute]) ? $rules[$attribute] : null;
    }

    public function render()
    {
        return view('livewire.account-detail');
    }
}
