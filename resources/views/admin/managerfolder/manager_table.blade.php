<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Name</th>
    <th>Email</th>
    <th>Image</th>
    <th>Phone</th>
    <th>Location</th>
    <th>About</th>
    <th>Role</th>
    <th>ACTION</th>
  </tr>

  @foreach($user as $user)

  <tr>

    <td>{{$user->id }}</td>

    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>
        @if(!empty($user->image))
        <img src="{{ url('/') }}/uploads/{{$user->image}}" style="width:50px; height:50px;border-radius: 25px;" />
        @else
        <img src="{{ asset('blank_user.PNG') }}" style="width:50px; height:50px;border-radius: 25px;" />
        @endif



    </td>
    <td>{{$user->phone}}</td>
    <td>{{$user->location}}</td>
    <td>{{$user->about}}</td>
    <td>
        <span class="svg-icon svg-icon-3">

             <?php if($user->role==1){?>

                <span>Manager</span>
             <?php  } ?>
             <?php if($user->role==2){?>

                <span>Engineer</span>
             <?php  } ?>
                      </span>
                    </a> </td>
    <td>
        <a href="{{ url('/') }}/admin/managerregistrations/{{$user->id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a onclick="return confirm('Are you sure you want to delete Manager Data ?')"  href="{{ url('/') }}/admin/managerregistrations/destroy/{{$user->id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>
    </td>
  </tr>
  @endforeach
</table>
