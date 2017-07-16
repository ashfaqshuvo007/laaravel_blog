@extends('admin.admin_master')
@section('admin_content')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Add Categories</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="icon_document_alt"></i>Forms</li>
                <li><i class="fa fa-file-text-o"></i>Form elements</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <h3 style="color:green;">
                <?php
                    $message = Session::get('message');
                    if($message)
                    {
                        echo $message;
                        Session::put('message',null);
                    }
                
                
                ?>
            </h3>
            <section class="panel">
                <header class="panel-heading">
                    Add Categories
                </header>
                <div class="panel-body">
                    {!! Form::open(['url' => '/save-category', 'method'=>'post', 'role'=>'form']) !!} 
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" name="category_name"  placeholder="Enter category name">
                        </div>

                        <div class="form-group">
                            <label for="">Category description </label>
                            <textarea class="form-control ckeditor" name="category_description" rows="6"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Publication Status</label>
                            <select class="form-control" name="publication_status">
                                <option>Select Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                            <button type="submit" class="btn btn-danger ">Cancel</button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </section>
        </div>
    </div>
</section>


@endsection