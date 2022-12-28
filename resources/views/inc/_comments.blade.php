@props(['comments'])
@auth
<!-- comment form -->
@if (session()->has('comment'))
<div class="alert alert-success">
    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('comment')}}

</div>
@endif
    <div class="col-md-12 w3_agileits_contact_grid_right margin">
    <h2 class="w3_agile_header">Comments<span> </span></h2>
    <form action="/comment" method="post">
        @csrf
    <span class="input input--ichiro">
    <input class="input__field input__field--ichiro" value="{{old('name')}}" type="text" id="input-25" name="name" placeholder=" "  />

    <label class="input__label input__label--ichiro" for="input-25">
    <span class="input__label-content input__label-content--ichiro">Your Name</span>
    </label>

    </span>
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
    <textarea name="comment" placeholder="Your message here..." >{{old('comment')}}</textarea>
        @error('comment')
        <p class="text-danger">{{$message}}</p>
        @enderror
    <input type="submit" value="Submit">
    </form>
    </div>

    <!-- Comments Section-->

<div class="clearfix"></div>
<div class="col-md-10 w3_agileits_contact_grid_right margin">
<h3 class="w3_agile_header">All Comments</h3>

@foreach ($comment as $comments)
<div class="margin">
        <b>{{$comments->name}}</b>
<p>{{$comments->comment}}</p>
<a  href="javascript:viod(0);" onclick="reply(this) " data-Commentid="{{$comments->id}}">Reply</a>
<div class="reply">
    @if(count($reply) > 0)
    @foreach($reply as $rep)
    @if($rep->comment_id == $comments->id)
        <b>{{$rep->name}}</b>
                    <p>{{$rep->reply}}</p>
                    <a  href="javascript:viod(0);" onclick="reply(this) " data-Commentid="{{$comments->id}}">Reply</a>
                    @endif
                    @endforeach

    @else
    @endif

</div>

    </div>


@endforeach

<div class="none margin" id="replyDiv">
    <form action="/replyComment" method="post">
        @csrf
    <input type="text" hidden  id="commentId" name="comment_id">

    <span class="input input--ichiro">
        <input class="input__field input__field--ichiro" value="{{old('name')}}" type="text" id="input-26" name="name" placeholder=" "  />

        <label class="input__label input__label--ichiro" for="input-26">
        <span class="input__label-content input__label-content--ichiro">Your Name</span>
        </label>

        </span>
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <textarea name="reply" placeholder="Your message here..." ></textarea>
        @error('reply')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="margin">
        <input type="submit" value="Reply" name="Submit" class="btn btn-success margin " id="">
        </div>
</form>
    <a href="javascript:viod(0);" class="btn btn-danger" id="btn" onclick="reply_close(this)">close</a>
</div>

</div>
{{$comment->links()}}

<script type="text/javascript">
function reply(caller)
{
document.getElementById('commentId').value =$(caller).attr('data-Commentid');

$('#replyDiv').insertAfter($(caller));
$('#replyDiv').show();
}
function reply_close(caller)
{

$('#replyDiv').hide();
}

</script>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
@endauth
