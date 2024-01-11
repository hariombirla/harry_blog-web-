
<!DOCTYPE HTML>
<head>
<title> Blogging System </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ asset('admin-assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href='//fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
<script src="{{ asset('admin-assets/js/jquery-1.11.1.min.js')}}"></script>

</head>
<body>
<div class="header">
 <div class="header_top">
    <div class="wrap">
	  <div class="header-top-left">
			<div class="logo">
			     <a href="index.html"><h1>Harry</h1>
			     	<h2>The Blog</h2>
			     </a>
			</div>
	 <div class="clear">
     </div>
   </div>
	   <div class="header-top-right">
	   			<div class="social-icons">
                    <a class="btn-logout-top" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    class="dropdown-item text-black">
                    <i class="fas fa-lock mr-2"></i> Logout </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
		 		    </div>
			  		 <div class="clear"></div>
		  		 </div>
		  		<div class="clear"></div>
	  		</div>
		</div>
</div>

<!--------------------- Main Content ------------------->
<div class="wrap">
	<div class="main">
		<div class="content">
			<div class="box1">
                @foreach ($blog as $blogs)
                        <h3><a>{{ $blogs->name }}</a></h3>
                        <div class="data">
                            <p>{{ $blogs->description }}</p>
                        </div>
                        Comments
                        @foreach ($blogs->comments as $comment)
                            <div class="comment-thread">
                                    <div class="comment-heading">
                                        <div class="comment-voting">
                                            <img src="{{ asset('/images/user.png')}}" alt="" class="rounded-circle" width="20" height="20">
                                        </div>
                                        <div class="comment-info">
                                            <a href="#" class="comment-author">{{ Auth::user()->name }}</a>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <a>
                                            {{ $comment->comment }}
                                        </a>
                                    </div>
                                </div>

                        @endforeach
                         <div class="comment_content_{{$blogs->id}}">
                          </div>
                        </br></br>
                            <textarea type="text" name="comment" class="add_comment" id ="comment_{{ $blogs->id }}" style="font-family:sans-serif;font-size:1.2em;"></textarea>
                            <input type="hidden" name="user_id" class="user_id" id ="user_id" value="{{ Auth::user()->id }}">
                            <button name="comment_button" class="comment_button btn-logout-top" data-comment="{{ $blogs->id }}">Add Comment</button>
                            </br></br>
                    @endforeach
			    <div class="clear"></div>
		    </div>
                <div class="page_links">
                <div class="clear"></div>
		</div>
    </div>

<div class="sidebar">
<div class="sidebar_top">
    <h3>Blog Categories</h3>
<div class="sidebar_top_list">
	 <ul>
        @foreach ($category as $categorys )
		<li>
        <a href="#"><span class="category-name">{{ $categorys->category_name }}</span><div class="clear"></div></a>
        </li>

        @endforeach
	</ul>
</div>
</div>


<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>

        <div class="copy_right">
            <p> © 2013 Share_Blog. All Rights Reserved | Design by  <a href="http://w3layouts.com">W3Layouts</a> </p>
        </div>
  </div>
</body>
</html>
<script>
$(".description_button").click(function(){
  var blog_id = $(this).data('comment');
  var user_id =$('#user_id').val();
  var comment = $('#comment_'+blog_id).val();
//   debugger;
  $.ajax({
    type: "POST",
    url: "storeComment",
    data: {
            '_token' : "{{csrf_token()}}",
            'blog_id': blog_id,
            'user_id':user_id,
            'comment': comment
        },
    dataType: "json",

    success: function(result){
        if(result.success){
            $('#comment_'+blog_id).val(' ');
            // $('.comment_content_'+blog_id).append('<a>'+comment+'</a></br>');
            $('.comment_content_'+blog_id).append('<div class="comment-thread"><div class="comment-heading"><div class="comment-voting"><img src="{{ asset('/images/user.png')}}" alt="" class="rounded-circle" width="20" height="20"></div><div class="comment-info"><a href="#" class="comment-author">{{ Auth::user()->name }}</a></div></div><div class="comment-body"> <a>'+comment+'</a></div></br>');
        }
    }
});

});

$(".comment_button").click(function(){
  var blog_id = $(this).data('comment');
  var user_id =$('#user_id').val();
  var comment = $('#comment_'+blog_id).val();
//   debugger;
  $.ajax({
    type: "POST",
    url: "storeComment",
    data: {
            '_token' : "{{csrf_token()}}",
            'blog_id': blog_id,
            'user_id':user_id,
            'comment': comment
        },
    dataType: "json",

    success: function(result){
        if(result.success){
            $('#comment_'+blog_id).val(' ');
            $('.comment_content_'+blog_id).append('<a>'+comment+'</a></br>');
        }
    }
});

});
</script>
