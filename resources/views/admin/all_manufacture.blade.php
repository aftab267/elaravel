@extends('admin_layout')
@section('admin_content')



<ul class="breadcrumb">

    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">All Manufacture</a></li>
</ul>
<p class="alert-success">
    @php
     $message=Session::get('message');
     if($message){
         echo $message;
         Session::put('message',null);
     }
    @endphp
</p>
    <div class="box span12">
<div class="box-content">
<table class="table table-striped table-bordered bootstrap-datatable datatable">
  <thead>
      <tr>
          <th>Sl</th>
          <th>Manufacture Name</th>
          <th>Manufacture Description</th>
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
        <td class="center">
            {{ $data->manufacture_name }}</td>
        <td class="center">{{ $data->manufacture_description }}</td>
        <td class="center">

            @if($data->publication_status==1)
             <span class="label label-success"> {{-- {{ $data->publication_status }}  --}}Active</span>
            @else
              <span class="label label-danger"> {{-- {{ $data->publication_status }} --}}Inactive</span>
            @endif

        </td>
        <td class="center">
            @if($data->publication_status==1)
            <a class="btn btn-danger" href="{{URL::to ('/inactive_manufacture/'.$data->manufacture_id) }}">
                <i class="halflings-icon white thumbs-down"></i>
            </a>
            @else
            <a class="btn btn-success" href="{{URL::to ('/active_manufacture/'.$data->manufacture_id) }}">
                <i class="halflings-icon white thumbs-up"></i>
            </a>
            @endif
            <a class="btn btn-info" href="{{URL::to ('/edit-manufacture/'.$data->manufacture_id) }}">
                <i class="halflings-icon white edit"></i>
            </a>
            <a class="btn btn-danger" href="{{URL::to ('/delete-manufacture/'.$data->manufacture_id) }}" id="delete">
                <i class="halflings-icon white trash"></i>
            </a>
        </td>
    </tr>
    @endforeach
  </tbody>


</table>
</div>
@endsection
