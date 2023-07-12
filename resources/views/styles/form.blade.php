<div class="collapse navbar-collapse" id="navbarSupportedContent">        
    
    
    <div class="user-button">
    	<a class="btn btn-primary">{{ Auth::user()->name }}</a>
	</div>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
<style>
	    table {
	        border-collapse: collapse;
	        width: 100%;
	    }

	    th, td {
	        border: 1px solid black;
	        padding: 8px;
	        text-align: left;
	    }
		.add-new-button {
	        text-align: right;
	        margin-bottom: 10px;
	    }

	    .user-button {
	        text-align: left;
	        margin-bottom: 10px;
	        display: inline-block;
	        padding: 8px 16px;
	        background-color: #808080;
	        color: #fff;
	        text-decoration: none;
	        border: none;
	        border-radius: 4px;
	        transition: background-color 0.3s ease;
	    }

	    .add-new-button a {
	        display: inline-block;
	        padding: 8px 16px;
	        background-color: #007bff;
	        color: #fff;
	        text-decoration: none;
	        border: none;
	        border-radius: 4px;
	        transition: background-color 0.3s ease;
	    }

	    .add-new-button a:hover {
	        background-color: #0056b3;
	    }

	    .edit-button {
        color: green;
        text-decoration: none;
	    }

	    .delete-button {
	        color: red;
	        text-decoration: none;
	        cursor: pointer;
	    }
	    
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            border: 2px solid #ccc;
            padding: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            width: 120px;
            margin-right: 10px;
        }

        .form-group .form-control {
            flex: 1;
            width: 200px;
            border: 1px solid #ccc;
            padding: 8px;
            outline: none;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>