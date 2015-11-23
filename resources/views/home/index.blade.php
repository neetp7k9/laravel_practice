<a href="auth/logout">logout</a>
Click here to reset your password: <a href="{{ url('password/reset/') }}">reset password</a>
<form action="image" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token()}}">
    Select image to upload:
    title<input type="text" name="name"> 
    description<input type="textarea" name="description"> 
    <input type="file" name="avatar" id="avatar">
    <input type="submit" value="Upload Image" name="submit">
</form>
