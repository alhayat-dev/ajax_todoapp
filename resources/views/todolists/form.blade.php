<div class="alert alert-success" style="display: none;" id="add-new-alert"></div>

<form action="{{ route("todolists.store", $todolist) }}">
    @csrf
    @method('post')
    <div class="form-group">
        <label for="" class="control-label">List Name</label>
        <input type="text" class="form-control input-lg" name="title" id="title">
        <span id="title-error"></span>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Description</label>
        <textarea rows="2" class="form-control" name="description"></textarea>
        <span id="description-error"></span>
    </div>

</form>
