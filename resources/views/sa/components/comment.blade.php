<div class="comments-form-full mt-5">
    <h2>Leave your Comment here </h2>
    @if(session()->has('success'))
        <div class="alert alert-success mt-3 mb-3">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('comment.store') }}" method="POST">
        @csrf
        <input type="hidden" name="content_url" value = "{{ $content->slug }}">
        <textarea name="message" placeholder="Write Comment" spellcheck="false" required></textarea>
        <input type="text" name="name" placeholder="Your Name">
        <div class="row">
            <div class="col-md-6"><input type="text" name="phone" placeholder="Your Phone"></div>
            <div class="col-md-6"><input type="email" name="email" placeholder="Your Email"></div>
        </div>
        <button type="submit">Submit Comment</button>
    </form>
</div>

    @if(!empty($content->comment[0]))
    <div class="comments-list-full mb-30 mt-30">
        <h2>{{ sizeof($content->comment) }} Comments</h2>
        <ul>
            @foreach($content->comment as $comment)
            <li class="single-comment" style="border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px">
                <div class="content">
                    @if(!empty($comment->name))<h4><a href="#">{{ $comment->name }}</a></h4>@endif
                    <span> {{ date('M d, Y - h:i') }} </span>
                    <p>{{ $comment->description }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
