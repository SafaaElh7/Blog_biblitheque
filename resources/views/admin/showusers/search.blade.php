<table class="table">
    <caption>List of users</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">cin</th>
            <th scope="col">telephone</th>
            <th scope="col">email</th>
            <th scope="col">Actions</th>

        </tr>
    </thead>
    <tbody>
        @if(!@empty($data))
        @php $i=1; @endphp
        @foreach($data as $info)
        <tr>
            <td>{{$i}}</td>
            <td>{{$info->name}}</td>
            <td>{{$info->cin}}</td>
            <td>@if($info->tel)</td>
            <td>@if($info->email)</td>
            <td>
                <a style="color:white" class="btn btn-sm btn-success" href="{{route('admin.showusers.edit',$info->id)}}">edit</a>
                <a style="color:white" class="btn btn-sm btn-danger" href="{{route('{{route('admin.showusers.destroy',$info->id)}}">delete</a>

            </td>
        </tr>
        @php $i++; @endphp
        @endforeach
        @else
        @endif
    </tbody>
</table>

<br>
<!-- <div class="col-md-12" id="ajaxpaginat">{{$data->links()}}</div> -->