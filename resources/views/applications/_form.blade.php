<form action="{{ route("applications.store") }}" method="post">
    @csrf
    @if($action=="edit")
        @method("PUT")
        <input type="hidden" value="{{ $application->id }}" name="application_id">
    @endif

    <div class="row">
        <div class="col-md-12">
            <label for="name">نام برنامه</label>
            <input type="text" name="name" id="name" value="{{ old("name",$application->name) }}" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="key">نام برنامه</label>
            <input type="text" name="key" id="key" value="{{ old("key",$application->key) }}" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="secret">نام برنامه</label>
            <input type="text" name="secret" id="secret" value="{{ old("secret",$application->secret) }}" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <input type="submit" value="Save">
        </div>
    </div>


</form>
