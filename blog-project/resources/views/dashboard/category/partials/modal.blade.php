<div class="modal fade" id="category-{{$category->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/dashboard/category/update/{{$category->id}}" method="POST" class="form">
    @csrf 
    <div class="form-group">
      <h3>Category Updating Form</h3>
      @include('partials._message')
    </div>
    <div class="form-group mt-4">
      <label for="" class="form-label">Category Name</label>
      <input type="text" name="name" value="{{$category->name}}" class="form-control">
    </div>
    <div class="form-group mt-3">
      <!-- <label for="" class="form-label"></label> -->
      <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$category->description}}</textarea>
    </div>
    <div class="form-group mt-3">
      <button style="float: right !important;" class="btn btn-primary">Create Group</button>
    </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>