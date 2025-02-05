<div class="container">
    <form action="{{route('user.create')}}" method="post">
        @csrf
        <input type="text" name="name" class="form-group">
        <input type="email" name="email" class="form-group">
        <input type="password" name="password" class="form-group">
        <button type="submit">Create New User</button>
    </form>
</div>
