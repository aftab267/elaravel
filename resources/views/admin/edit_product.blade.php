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
                <a href="#">Update Product</a>
            </li>
        </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>

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
            <form class="form-horizontal" method="post" action="{{ url('/update-product',$result->product_id) }}">
                @csrf
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="date01">Product Name</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_name" value="{{ $result->product_name }}" >
                  </div>
                </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Product Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="product_short_description" rows="3"  >
                        {{ $result->product_short_description }}
                    </textarea>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Product Price</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" name="product_price" value="{{ $result->product_price }}" >
                    </div>
                  </div>
                {{-- <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Publication Status</label>
                  <div class="controls">
                    <input type="checkbox" name="publication_status" value="1">
                  </div>
                </div> --}}
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update product</button>

                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection
