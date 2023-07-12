<html>
<head>
    @include('styles.form')
</head>

<body>
    <h1 class="heading">Edit Note</h1>
    <div class="form-container">
        <form id="myForm" method="POST" action="{{ route('notes.update',$note) }}" enctype="multipart/form-data">
            @csrf
            @method('put')  

            <div class="form-group">
                <label for="name">Note</label>
                <textarea name="note" id="note">{{$note->note_text}}</textarea>
                @if ($errors->has('note_text'))
                    <span class="error-message">{{ $errors->first('note_text') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="image">image</label>
                <input type="file" id="image" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" onchange="loadImage(event)">
                <p>
                    @if ($note->image)
                        <img src="{{ $note->image }}" id="output-image" height="100">
                    @else
                        <img id="output-image" height="100">
                    @endif
                </p>

                <script>
                    var loadImage = function(event) {
                        var image = document.getElementById('output-image');
                        image.src = URL.createObjectURL(event.target.files[0]);
                        image.height = '100';
                    };
                </script>

                @if ($errors->has('image'))
                    <span class="error-message">{{ $errors->first('image') }}</span>
                @endif
            </div>

            <div>
                <center>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" onclick="window.location.href='{{ route('notes.index') }}'" class="btn btn-secondary">Cancel</button>
                </center>
            </div>
        </form>
    </div>

</body>
</html>
