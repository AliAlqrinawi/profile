{{--// Create Work--}}
<div class="modal fade" id="ModalAddWork" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <form id="FormAddWork" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="site_title">Title:</label>
                        <div class="col-md-12">
                            <textarea id="add_title_word" name="title_ar" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="site_title">Title in Arabic:</label>
                        <div class="col-md-12">
                            <textarea id="add_title_ar_word" name="title_en" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Category:</label>
                        <div class="col-md-12">
                            <select name="id_category" id="add_category_word"
                                    class="form-control  nice-select  custom-select">
                                @foreach($category as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">images:</label>
                        <div class="col-md-10">
                            <input id="add_images_word" type="file" name="images[]" accept="image/*" multiple>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary AddWork">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{--// Edit Work--}}
<div class="modal fade" id="ModalEditWork" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category Edite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Are you sure want edite this category</h6>
                <ul id="list_error_messagee"></ul>
                <form id="FormEditWork" enctype="multipart/form-data">
                    <input type="hidden" id="id_work">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="site_title">Title:</label>
                        <div class="col-md-12">
                            <textarea id="edit_title_word" name="title_ar" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="site_title">Title in Arabic:</label>
                        <div class="col-md-12">
                            <textarea id="edit_title_ar_word" name="title_en" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group ss">
                        <label class="col-md-3 control-label">Category:</label>
                        <div class="col-md-12">
                            <select name="id_category" id="edit_category_work"
                                    class="form-control  nice-select  custom-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
{{--                    <div class="d-inline">--}}
{{--                        <button type="submit"--}}
{{--                                class="modal-effect btn btn-sm btn-danger"><i class="las la-trash"></i></button>--}}
{{--                        <div class="card-aside-img d-inline">--}}
{{--                            <img src="" id="iiiii" alt="img" style="width: 60px; height: 60px; margin: 10px;">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label class="col-md-2 control-label">images:</label>
                        <div class="col-md-10">
                            <input id="edit_images_word" type="file" name="images[]" accept="image/*" multiple>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary EditWork">Save changes</button>
            </div>
        </div>
    </div>
</div>
