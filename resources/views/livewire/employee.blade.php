@include('layouts.layout')
<div  class="content-wrapper p-4">

    <div>
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-center">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div><br>
    <div class="row m-4">
        <div class="col-lg-2">
            </div>
        <div class="col-lg-4">
            <h4>Name</h4>
            <h4>Title</h4>
            <h4>Address</h4>
            <h4>Phonee</h4>
            <h4>Paid Leave</h4>
        </div>
        <div class="col-lg-6">
            <h4>: {{$employees['0']->name}}</h4>
            <h4>: {{$employees['0']->tittle}}</h4>
            <h4>: {{$employees['0']->adress}}</h4>
            <h4>: {{$employees['0']->phone}}</h4>
            <h4>: {{$employees['0']->paid_leave}}</h4>
        </div>

    </div>

    @if($isModal)
    <div class="d-flex justify-content-center">
        <button class=" btn btn-primary"  wire:click="openModal">Apply Paid Leave</button>
    </div><br>
    @else 
    <div class="d-flex justify-content-center">
        <button class=" btn btn-primary"  wire:click="openModal">Apply Paid Leave</button>
    </div><br>
    
    @endif

    

    @if($isModal)
    <form wire:submit.prevent="apply_paid_leave">
        <input type="hidden" wire:model="id_employee" >
        
        <label for="start" class="form-label mb-1">Start</label>
        <input type="date" wire:model="start" class="form-control mb-2" id="start" >


        <label for="end" class="form-label mb-1">Start</label>
        <input type="date" wire:model="end" class="form-control mb-2" id="end" >

<div class="col-lg-12">
    <label for="reason" class="form-label mb-1">Reason</label>
        <textarea wire:model="reason" id="reason" style="width: 100%" rows="7"></textarea><br>
    
</div><br>
<center>
<button class="btn btn-primary">Submit</button>
</center><br><br>
</form>
@endif




<center><h4>History Paid Leave</h4></center>
    <table class="table table-bordered ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">Reason </th>
                <th scope="col">status </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paid_leaves as $paid_leave)
                
            <tr>
                {{-- <td>{{date_format($employee->created_at,'l, F Y,H:i')}}</td> --}}
                <td>{{$paid_leave->start}}</td>
                <td>{{$paid_leave->until}}</td>
                <td>{{$paid_leave->reason}}</td>
                <td>{{$paid_leave->status}}</td>
               
            @endforeach
        </tbody>
    </table>
</div>
  



