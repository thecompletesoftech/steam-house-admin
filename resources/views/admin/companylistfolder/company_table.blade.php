<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Meter ID.</th>
    <th>Manager</th>
    <th>Username</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Image</th>
    <th>address</th>
    <th>About</th>
    <th>ACTION</th>
  </tr>

  @foreach($user as $user)

  <tr>

    <td>{{$user->id }}</td>
    <td>{{$user->meter_id}}</td>
    <td>{{getNameById($user->manager_id)}}</td>
    <td>{{$user->username}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->phone}}</td>
    <td><img src="{{ url('/') }}/companylists/image/{{$user->image}}" style="width:50px; height:50px;" /></td>
    {{-- <td>{{$user->address}}</td> --}}
    {{-- <td>{{$user->longitude}}</td> --}}
    <td>{{$user->address}}</td>
    <td>{{$user->about}}</td>
    <td>
        <a href="{{ url('/') }}/admin/companylists/{{$user->id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/companylists/destroy/{{$user->id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>
    </td>
  </tr>
  @endforeach
</table>
