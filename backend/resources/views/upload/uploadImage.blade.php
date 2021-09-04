



<form action="{{route('uploadImage')}}" method="POST" enctype="multipart/form-data">    
    @csrf
    <input type="text" name="title" placeholder="title">
    <input type="text" name="content" placeholder="content">
    <input type="file" name="image">
    <button>Submit</button>
</form>