@include('layouts.layout')
<div  class="content-wrapper p-4">
 

            <center><h3>Proccesed</h3></center><br>
            <table class="table table-bordered ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Paid Leave</th>
                        <th scope="col">Start</th>
                        <th scope="col">End </th>
                        <th scope="col">Reason </th>
                        <th scope="col">Status </th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paid_leaves2 as $paid_leave)
                        {{-- @foreach ($paid_leaves->employee as $employees) --}}
                    <tr>
                        <td>{{$paid_leave['employee']->name}}</td>
                        {{-- @endforeach --}}
                        <td>{{$paid_leave['employee']->tittle}}</td>
                        <td>{{$paid_leave['employee']->paid_leave}}</td>
                        <td>{{$paid_leave->start}}</td>
                        <td>{{$paid_leave->until}}</td>
                        <td>{{$paid_leave->reason}}</td>
                        <td>  <div class="col-md-12">
                    <select wire:model="status.{{$paid_leave->id}}" class="form-control" >
                        <option value="" selected>Status</option>
                      
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                      
                    </select>
                </div></td>
                        <td><button wire:click="update({{$paid_leave->id}})" class="btn btn-s btn-warning">Edit</button></td>
                    </tr>
        
                    @endforeach
                </tbody>
            </table><br><br><hr>
            <center><h3>List </h3></center><br>
            <table class="table table-bordered ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Paid Leave</th>
                        <th scope="col">Start</th>
                        <th scope="col">End </th>
                        <th scope="col">Reason </th>
                        <th scope="col">Status </th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paid_leaves as $paid_leave)
                        {{-- @foreach ($paid_leaves->employee as $employees) --}}
                    <tr>
                        <td>{{$paid_leave['employee']->name}}</td>
                        {{-- @endforeach --}}
                        <td>{{$paid_leave['employee']->tittle}}</td>
                        <td>{{$paid_leave['employee']->paid_leave}}</td>
                        <td>{{$paid_leave->start}}</td>
                        <td>{{$paid_leave->until}}</td>
                        <td>{{$paid_leave->reason}}</td>
                        <td> {{$paid_leave->status}}</td>
                    </tr>
        
                    @endforeach
                </tbody>
            </table><br><br>
        
        
        
        
</div>
