<form action="{{ route("applications.store") }}" method="post">
    @csrf
    @if($action=="edit")
        @method("PUT")
        <input type="hidden" value="{{ $application->id }}" name="application_id">
    @endif

    <x-errors></x-errors>
    <x-success></x-success>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Application Name</label>
                <input type="text" name="name" id="name" value="{{ old("name",$application->name) }}"
                       class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="key">Application Key</label>
                <input type="text" name="key" id="key" value="{{ old("key",$application->key) }}" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="secret">Secret</label>
                <input type="text" name="secret" id="secret" value="{{ old("secret",$application->secret) }}"
                       class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment"  rows="5" class="form-control">{{ old("comment",$application->comment) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <input type="submit" value="Save">
        </div>
    </div>


</form>
