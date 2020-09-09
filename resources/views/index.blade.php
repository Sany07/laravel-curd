@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>City</td>
          <td>Country</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->city}}</td>
            <td>{{$contact->country}}</td>
            <td>
            <a href="{{ route('contacts.edit',$contact->id)}}"   class="btn btn-primary">Edit</a>
            </td>

            <td>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button onclick="deleteData()"  class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <button onclick="deleteData()"  class="btn btn-danger" type="submit">Delete</button>

        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection