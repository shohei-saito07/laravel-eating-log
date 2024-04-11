@extends('layouts.app')

@section('content')
    <div class="container">
          <table>
               <tr>
                    <th>Company Name</th>
                    <td>{{ $basicInfo->company_name }}</td>
               </tr>
               <tr>
                    <th>Address</th>
                    <td>{{ $basicInfo->address }}</td>
               </tr>
               <tr>
                    <th>Telephone Number</th>
                    <td>{{ $basicInfo->telephone_number }}</td>
               </tr>
               <tr>
                    <th>Email Address</th>
                    <td>{{ $basicInfo->email_address }}</td>
               </tr>
               <tr>
                    <td colspan="2">
                        <a href="{{ route('basicInfo.edit', $basicInfo->id) }}" class="btn btn-primary">Edit</a>
                    </td>
               </tr>
          </table>
    </div>
@endsection
