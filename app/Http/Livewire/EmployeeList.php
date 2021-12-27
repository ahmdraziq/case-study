<?php

namespace App\Http\Livewire;

use App\Enums\EmployeeStatus;
use App\Models\Address;
use App\Models\Employee;
use App\Models\UserRole;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    use WithPagination;
    public $name, $icno, $dob, $role = null;
    public $street_address, $postcode, $city, $state, $country;
    public $p_country, $p_state, $p_city, $p_postcode, $search, $p_status;
    public $roles;
    public $allcountry, $allstate, $allzip, $allcity;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $employee = Employee::with('address')->where(function ($q) {
            $q->where('fullname', 'like', '%' . $this->search . '%')
                ->orWhere('icno', 'like', '%' . $this->search . '%');
        })->when($this->p_country, function ($q) {
            $q->whereHas('address', function ($q2) {
                $q2->where('country', 'like', '%' . $this->p_country . '%');
            });
        })->when($this->p_state, function ($q) {
            $q->whereHas('address', function ($q2) {
                $q2->where('state', $this->p_state);
            });
        })->when($this->p_city, function ($q) {
            $q->whereHas('address', function ($q2) {
                $q2->where('city', $this->p_city);
            });
        })->when($this->p_postcode, function ($q) {
            $q->whereHas('address', function ($q2) {
                $q2->where('postcode', $this->p_postcode);
            });
        });

        if ($this->p_status != '')
            $employee = $employee->where('status', $this->p_status);

        $this->allcountry = Address::select('country')->groupBy('country')->get();
        $this->allstate = Address::select('state')->groupBy('state')->get();
        $this->allzip = Address::select('postcode')->groupBy('postcode')->get();
        $this->allcity = Address::select('city')->groupBy('city')->get();

        return view('livewire.employee-list', [
            'employees' => $employee->paginate(10),
        ]);
    }

    public function mount()
    {
        $this->roles = UserRole::all();
        $this->allcountry = Address::select('country')->groupBy('country')->get();
        $this->allstate = Address::select('state')->groupBy('state')->get();
        $this->allzip = Address::select('postcode')->groupBy('postcode')->get();
        $this->allcity = Address::select('city')->groupBy('city')->get();
    }

    public function addEmployee()
    {
        $this->validate([
            'street_address' => 'required|max:255',
            'postcode' => 'required|numeric',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'name' => 'required|max:255',
            'icno' => 'required|max:20|unique:employees',
            'dob' => 'required|date',
        ]);

        $address = Address::create([
            'street_address' => ucwords($this->street_address),
            'postcode' => $this->postcode,
            'city' => ucwords($this->city),
            'state' => ucwords($this->state),
            'country' => ucwords($this->country),
        ]);

        Employee::create([
            'icno' => $this->icno,
            'fullname' => $this->name,
            'dateofbirth' => $this->dob,
            'role_id' => $this->role,
            'address_id' => $address->id,
        ]);

        $this->dispatchBrowserEvent('employee-added');
    }

    public function updateEmployee($id)
    {
        Employee::find($id)->update([
            'status' => Employee::find($id)->status->is(1) ? EmployeeStatus::Inactive : EmployeeStatus::Active,
        ]);
    }

    public function applyFilter()
    {
    }

    public function resetFilter()
    {
        $this->p_country = null;
        $this->p_state = null;
        $this->p_city = null;
        $this->p_postcode = null;
        $this->search = null;
        $this->p_status = null;
    }
}
