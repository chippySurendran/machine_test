@if (session($key ?? 'status'))
    <div class="alert alert-success" role="alert" style="padding: 15px;"><b>
        {{ session($key ?? 'status') }}</b>
    </div>
@endif
