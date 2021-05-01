@extends('layout.app')

@section('content')
<table class="table table-striped" style="margin-top: 70px;">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th colspan="2">NAME
                    </th>
                    <th>EMAIL</th>
                    <th>CONTACT NO</th>
                    <th>WEBSITE LINK</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            
            @foreach($user as $u)

            <?php //echo '<pre>'; print_r($u->vendors());exit();?>
                        
            <tr class="text-center">

                <td>{{ $u->id }}</td>
                <td>{{ $u->first_name }}</td>
                <td>{{ $u->last_name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->contact_no }}</td>
                <td>{{ $u->vendors->website_link }}</td>
                
                <td> <a href="{{ route('delete',['id'=>$u->id]) }}"><i class="material-icons" style="margin-left: 30px; font-size: 25px; padding: 3px;">&#xE872;</i></a>
    
                <a href="{{ route('edit',['id'=>$u->id]) }}"><i class="material-icons" style="font-size: 25px;padding: 3px;">&#xE254;</i></a>

                <a href="{{route('viewvendor',['id'=>$u->id]) }}"><i class="material-icons" style="font-size:25px;padding: 3px;">view_list</i></a> 
                    @if($u->status == 'new')
                    
                        <a href="{{route('changestatus',['id'=>$u->id]) }}"><i class="material-icons" style="font-size: 28px;padding: 3px;color: red;">check</i></a>  
                    @else
                    
                        <a href="{{route('changestatus',['id'=>$u->id]) }}"><i class="material-icons" style="font-size: 28px;padding: 3px; color: green;">check</i></a>
                @endif
            </td>
                
            </tr>
           @endforeach

            
        </table>
@endsection

