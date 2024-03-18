<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
    <p>Congrats!! you are a registered user and you logged in now</p>
    <form action="/logout" method="POST">
        @csrf
    <button style="color:green">log out</button>
    </form>

    <div style="border: 3px solid black;">
        <h2>Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input name="title" type="text" placeholder="post title">
            <textarea name="body" type="text" placeholder="body content"></textarea>
            <button style="color: brown"> Save post </button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>All posts</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding:6px; margin:6px;">
            <h3>{{$post['title']}}</h3>
            {{$post['body']}}

            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </div>
        @endforeach

    </div>




    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button style="color: red"> Register now </button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Log in</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button style="color: black"> login now </button>
        </form>
    </div>

    @endauth
</body>
</html>
