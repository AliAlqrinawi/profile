<div class="modal fade" id="editeCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category Edite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Are you sure want delete this category</h6>
                <ul id="list_error_message"></ul>
                <input type="hidden" id="edit_Category_id">

                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name_en" id="edit_Category_name_en" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Slug</label>
                    <input type="text" class="form-control" name="name_ar" id="edit_Category_name_ar"
                           placeholder="Slug">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary UpdateCategory">Save changes</button>
            </div>
        </div>
    </div>
</div>
