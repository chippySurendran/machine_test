<html>
<head>
    @include('styles.form')
</head>

<body>
    <h1 class="heading">Add Note</h1>
    <div class="form-container">
        <form id="myForm" method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Note</label>
                <textarea name="note" id="note"></textarea>
                @if ($errors->has('nanoteme'))
                    <span class="error-message">{{ $errors->first('note') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="profile_pic">Image</label>
                <input type="file" id="image" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" onchange="loadImage(event)" required>

                <p><img id="output-image" height="100" /></p>

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
