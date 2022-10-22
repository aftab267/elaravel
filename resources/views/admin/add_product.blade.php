@extends('admin_layout')
@section('admin_content')

        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <i class="icon-edit"></i>
                <a href="#">Add Product</a>
            </li>
        </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

            </div>
        <div class="box-content">
            <p class="alert-success">
                @php
                 $message=Session::get('message');
                 if($message){
                     echo $message;
                     Session::put('message',null);
                 }
                @endphp
            </p>
            <form class="form-horizontal" method="post" action="{{ url('/save-product') }}" enctype="multipart/form-data">
                @csrf
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="date01">Product Name</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_name" >
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="selectError3">Product Category</label>
                    <div class="controls">
                      <select id="selectError3" name="category_id">
                        <option value="">Select Category</option>

                        <?php
                        $all_publish_category=DB::table('tbl_categories')
                        ->where('publication_status',1)->get();
                        foreach ($all_publish_category as $data) {
                           ?>
                        <option value="{{ $data->category_id }}">{{ $data->category_name }}</option>
                        <?php
                        }
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="selectError3">Manufacture Name</label>
                    <div class="controls">
                      <select id="selectError3" name="manufacture_id">
                        <option value="">Select Manufacture</option>

                        <?php
                        $all_publish_manufacture=DB::table('manufactures')
                        ->where('publication_status',1)->get();
                        foreach ($all_publish_manufacture as $data) {
                           ?>
                        <option value="{{ $data->manufacture_id }}">{{ $data->manufacture_name }}</option>
                        <?php
                        }
                        ?>

                      </select>
                    </div>
                  </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Product Short Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="product_short_description" rows="3" ></textarea>
                  </div>
                </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Product Long Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="product_long_description" rows="3" ></textarea>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Product Price</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_price" >
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="fileInput">Product Image</label>
                    <div class="controls">
                      <input class="input-file uniform_on" id="fileInput" type="file" name="product_image">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Size</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_size" >
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="date01">Product Colour</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_colour" >
                    </div>
                  </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Publication Status</label>
                  <div class="controls">
                    <input type="checkbox" name="publication_status" value="1">
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection

