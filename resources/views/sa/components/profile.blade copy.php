
@forelse ($members as $member)
<div class="row mt-5 shadow mb-5 bg-white rounded">
    <div class="col-md-3 shop_border">
        <div class="shop_logo h-100">
            <img src="{{ $member->logo }}" alt="">
        </div>
    </div>
    <div class="col-md-9">                       
        <div class="py-5 px-2 px-md-5">
            <h2 class="text-dark mb-4">
                <a href="{{ $member->slug }}" class="mt-3">{{ $member->title }}</a>
            </h2>
            <table class=" table mt-2">
                <tbody>
                    @foreach ($member->employee as $item)
                    <tr>
                        <td class="text-start">Rep. Name</td>
                        <td>:</td>
                       
                         <td class="text-start">{{ $item->name }}</td>
                  
                        
                    </tr>
                    <tr>
                        <td class="text-start">Designation</td>
                        <td>:</td>
                        <td class="text-start">
                            {{ $item->designation }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-start">Mobile</td>
                        <td>:</td>
                        <td class="text-start">{{ $member->mobile }}</td>
                    </tr>
                    <tr>
                        <td class="text-start">Email</td>
                        <td>:</td>
                        <td class="text-start">{{ $member->email }}</td>
                    </tr>
                    <tr>
                        <td class="text-start">Web</td>
                        <td>:</td>
                        <td class="text-start">{{ $member->mobile }}</td>
                    </tr>
                    <tr>
                        <td class="text-start">Address</td>
                        <td>:</td>
                        <td class="text-start">
                            {{ $member->companyWebsite }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ $member->slug }}" class="btn event_btn mt-2 fs-4 text-white"> See Details</a>
        </div>
    </div>
</div>

@empty
    No Member Found
@endforelse