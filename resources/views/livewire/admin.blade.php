@include('layouts.layout')
<div  class="content-wrapper p-4">
 

    


    <center><h3>List Employee</h3></center><br>
    @if($addMode)
    <div class="d-flex justify-content-end">
        <button wire:click="close" class="btn btn-s btn-danger mb-4">Close Form</button>
    </div>
    @else
    <div class="d-flex justify-content-end">
        <button wire:click="add" class="btn btn-s btn-primary mb-4">Add Data</button>
    </div>
    @endif


    <table class="table table-bordered ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Address </th>
                <th scope="col">Phone</th>
                <th scope="col">Paid Leave</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                
            <tr>
                {{-- <td>{{date_format($employee->created_at,'l, F Y,H:i')}}</td> --}}
                <td>{{$employee->name}}</td>
                <td>{{$employee->tittle}}</td>
                <td>{{$employee->adress}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->paid_leave}}</td>
                <td>
                    <button wire:click="edit({{$employee->id}})" class="btn btn-s btn-warning">Edit</button>
                    </td>
                

            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
    <br><br>
@if($addMode)
<hr>
<center><h3>Add Data</h3></center>
    <form wire:submit.prevent="store">

    <label for="name" class="form-label">Name</label>
    <input type="text" wire:model="name" class="form-control" id="name"  @error('name') is-invalid @enderror">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <label for="tittle" class="form-label">Title</label>
    <input type="text" wire:model="tittle" class="form-control" id="tittle">
        @error('tittle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <label for="adress" class="form-label">address</label>
    <input type="text" wire:model="adress" class="form-control" id="adress" >
        @error('adress')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <label for="phone" class="form-label">phone</label>
    <input type="text" wire:model="phone" class="form-control" id="phone" >
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <label for="paid_leave" class="form-label">Paid Leave</label>
    <input type="text" wire:model="paid_leave" class="form-control" id="paid_leave" >
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <label for="email" class="form-label">Email</label>
    <input type="email" wire:model="email" class="form-control" id="email" >
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            
    <div class="d-flex justify-content-center m-4">
        <button class="btn btn-primary">Submit</button>
    
    </div>
    

    </form>

    @endif
    @if($editMode)
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="formName" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formName" wire:model="name">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formEmail" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formEmail" wire:model="email">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formPhone" class="block text-gray-700 text-sm font-bold mb-2">Telp:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formPhone" wire:model="phone_number">
                            @error('phone_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select class="form-control" wire:model="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="1">Premium</option>
                                <option value="0">Free</option>
                            </select>
                            @error('status') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
    
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Cancel
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>


    <center><h3>Edit Data</h3></center>
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="id_employee">

    <label for="name" class="form-label">Name</label>
    <input type="text" wire:model="name" class="form-control" id="name"  @error('name') is-invalid @enderror">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <label for="tittle" class="form-label">Title</label>
    <input type="text" wire:model="tittle" class="form-control" id="tittle">
        @error('tittle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <label for="adress" class="form-label">address</label>
    <input type="text" wire:model="adress" class="form-control" id="adress" >
        @error('adress')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <label for="phone" class="form-label">phone</label>
    <input type="text" wire:model="phone" class="form-control" id="phone" >
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <label for="paid_leave" class="form-label">Paid Leave</label>
    <input type="text" wire:model="paid_leave" class="form-control" id="paid_leave" >
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <label for="email" class="form-label">Email</label>
    <input type="email" wire:model="email" class="form-control" id="email" >
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            
    <div class="d-flex justify-content-center m-4">
        <button class="btn btn-primary">Submit</button>
    
    </div>
    

    </form>
    @endif
</div>
