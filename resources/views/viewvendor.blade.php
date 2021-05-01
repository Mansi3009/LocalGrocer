@extends('layout.app')

@section('content')
<div class="table-responsive-sm" style="margin-top: 20px;">
  <div class="card" style="background-color: white;">
        <div class="card-body">
            <table class="table table-borderless">
                <tr style="border-bottom: 1px solid lightgray;">
                    <td class="h3">Details</td>
                </tr>
            </table>
</div><br>
<div class="table-responsive-md">    
    <table class="table table-borderless">
        <tr>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>EMAIL</th>
            <th>CONTACT NO</th>
        </tr>
        <tr>
            <td>{{ $users->users->first_name }}</td>
            <td>{{ $users->users->last_name }}</td>
            <td>{{ $users->users->email }}</td>
            <td>{{ $users->users->contact_no }}</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>    
    </table>
</div><br>

<div class="table-responsive-lg">
  <table class="table table-borderless">
                
                <tr>
                    <th>BRAND NAME</th>
                    <th>YEAR OF ESTABLISH</th>
                    <th>PRODUCT CATEGORY</th>
                    <th>WEBSITE LINK</th>                
                </tr>
                
                <tr>
                    <td>{{ $users->brand_name }}</td>
                    <td>{{ $users->establish_year }}</td>
                    <td>{{ $users->product_category }}</td>
                    <td>{{ $users->website_link }}</td> 
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>        
  </table><br><br>
</div>

<div class="table-responsive-xl">
  <table class="table table-borderless">
                <tr>
                    <th>IMAGES</th>
                    <th>REGISTRATION PROOF</th>
                    <th>CREATED AT</th>
                    <th>UPDATED AT</th>
                </tr>
                <tr>
                    
                    <td>
                        <?php $explodeImages = explode(',', $users->image);?>
                        
                        @foreach($explodeImages as $explodeImage)
                            <img style="width: 100px; height: 100px;" src="{{ asset('/storage/uploads/vendor/' . $explodeImage) }}">
                        @endforeach 
                           
                    </td>    
                    <td>{{ $users->registration_proof }}</td>
                    <td>{{ $users->created_at }}</td>
                    <td>{{ $users->updated_at }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
</table>
</div>
</table>
</div>
</div>

@endsection