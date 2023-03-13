<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

    <tr>
        <th>ID(Ticket)</th>
        <th>Emp</th>
        <th>Manager</th>
        <th>Company Name</th>
        <th>Picture</th>
        <th>Phone</th>
        <th>Discription</th>
        <th>ACTION</th>
      </tr>
  @foreach($servicerequest as $user)
  <tr>
    <td>{{$user->id }}</td>
    <td>{{getNameById($user->emp_id)}}</td>
    <td>{{$user->managername}}</td>
    <td>{{$user->Service_request}}</td>
    {{-- <td>{{$user->pictures}}</td> --}}
    <td>
        @foreach(json_decode($user->pictures,true) as $image)
        <img src="{{ url('/') }}/uploads/servicerequests/image/{{$image}}" height="50" weight="50">
        @endforeach
    </td>
    <td>{{$user->phone}}</td>
    <td>{{$user->discription}}</td>




    <td>
        {{-- <a href="{{ url('/') }}/admin/servicerequests/{{$user->id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a> --}}
        <a href="{{ url('/') }}/admin/servicerequests/destroy/{{$user->id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>
    </td>
  </tr>
  @endforeach
</table>
