@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">  
 <div class="main-card mb-3 card">   
        <div class="card-body">
        <h5 class="card-title">Contact List</h5>
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
                    @forelse ($contacts as $contact)
                    <tr>
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }} </td>
                        <td>{{ $contact->phone }} </td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at }}</td>
                    </tr>
                    @empty
                        No Contact Found
                    @endforelse
                </tbody>
            </table>
        <div class="paginated">
            {{ $contacts->links() }}
        </div>
        </div>
    </div>
</div>
@endsection