@extends('admin_layout')
@section('admin_content')


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>
        <div class="box span12">
<div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
      <thead>
          <tr>
              <th>Sl</th>
              <th>Category Name</th>
              <th>Category Description</th>
              <th>Publication Status</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
        @php
        $x=1;
        @endphp
        @foreach($result as $data)
        <tr>
            <td>{{ $x++ }}</td>
            <td class="center">{{ $data->category_name }}</td>
            <td class="center">{{ $data->category_description }}</td>
            <td class="center">

                @if($data->publication_status==1)
                <span class="label label-success">{{ $data->publication_status }} </span>
                 @else
                 <span class="label label-danger">{{ $data->publication_status }}</span>
                 @endif

            </td>
            <td class="center">
                <a class="btn btn-success" href="#">
                    <i class="halflings-icon white thumbs-up"></i>
                </a>
                <a class="btn btn-info" href="#">
                    <i class="halflings-icon white edit"></i>
                </a>
                <a class="btn btn-danger" href="#">
                    <i class="halflings-icon white trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
      </tbody>

  </table>
</div>

@endsection
