<div class="subscribe-box">
    <h3 class="display-6 text-dark text-center">Don't miss any update from us</h3>
    @if (session('subscribe'))
        <div class="alert alert-success">
            {{ session('subscribe') }}
        </div>
    @endif
    <form action="{{URL::to('subscribe-store')}}" class="f_subscribe_two" method="post">
        @csrf
        <input type="text" name="email" id="email" autocomplete="off" class="form-control p-3 mt-4 text-center" placeholder="ENTER YOUR EMAIL" required>
        <button class="btn btn-dark btn-lg d-block w-100 mt-4 p-3" type="submit">SUBMIT</button>
    </form>
</div>