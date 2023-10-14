@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">  
 <div class="main-card mb-3 card">   
        <div class="card-body">
        <h5 class="card-title">Quotation List</h5>
            <table class="mb-0 table table-bordered">
                <thead>
                <tr>
                    <th>Serial number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th width="10%">Date</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($quote as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }} </td>
                            <td>{{ $item->phone }} </td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->created_at }}</td>   
                        </tr>
                    @empty
                        No Quote Found
                    @endforelse
                </tbody>
            </table>
         <div class="paginated">
            {{ $quote->links() }}
        </div>
        </div>
    </div>
</div>
@endsection