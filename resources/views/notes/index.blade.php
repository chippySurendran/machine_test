
<html>

	@include('styles.form')
	<div class="alert">
	    <center>
	        @include('alerts.success')
	    </center>
	</div>

	<div class="add-new-button">
    	<a href="{{ route('notes.create') }}" class="btn btn-primary">Add New</a>
	</div>
	

	@if(count($notes)>0)
	<h1 class="heading">Notes List</h1>
	<table>
	    <thead>
	        <tr>
	            <th>UserName</th>
	            <th>Note</th>
	            <th>Image</th>
	            <th>Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach ($notes as $note)
	        <tr>
	            <td>{{ucfirst($note->user->name)}}</td>
	            <td>{{$note->note_text}}</td>
	            <td>
				    <img src="{{ asset($note->image) }}" alt="Profile Pic" width="100">
				</td>

	            <td>
	            	<a href="{{ route('notes.edit', $note->id) }}" class="edit-button">Edit</a><br>
	            	<form action="{{ route('notes.destroy', $note->id) }}" method="post">
                      	@csrf
                      	@method('delete') 
                      	<a class="delete-button"
                        onclick="confirm('{{ __("Are you sure you want to delete this note?") }}') ? this.parentElement.submit() : ''">Delete</a>
                    </form>
	            </td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
	@else
	<center>No Notes Found</center>
	@endif
</html>
