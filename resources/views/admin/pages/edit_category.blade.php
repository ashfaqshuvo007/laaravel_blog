@extends('admin.admin_master')
@section('admin_content')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Edit Categories</h3>
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
                    Edit Categories
                </header>
                <div class="panel-body">
                   
                    {!! Form::open(['url' => '/update-category', 'method'=>'post','name'=>'edit_category']) !!} 
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" name="category_name"  value="<?php echo $category_info->category_name ;?>">
                            <input type="hidden" class="form-control" name="category_id"  value="<?php echo $category_info->category_id ;?>">
                        </div>

                        <div class="form-group">
                            <label for="">Category description </label>
                            <textarea class="form-control ckeditor" name="category_description" rows="6"><?php echo $category_info->category_description ; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Publication Status</label>
                            <select class="form-control" name="publication_status">
                                <option>Select Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary ">Update</button>
                            <button type="reset" class="btn btn-danger ">Cancel</button>
                        </div>

                    {!! Form::close() !!}
                    
                </div>
            </section>
        </div>
    </div>
</section>


@endsection