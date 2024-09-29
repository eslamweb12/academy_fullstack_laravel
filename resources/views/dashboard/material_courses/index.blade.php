@extends('dashboard.adminDashboard')

@section('table')
    <table class="table table-bordered table-hover table-striped" style="margin-top: 90px; width: 1000px;" >
        <thead>
        <tr>
            <td>title</td>
            <td>type</td>
            <td>link</td>
            <td>control</td>
        </tr>
        </thead>
        <tbody>
        @foreach($materials as $material)


        <tr>
            <td>{{$material->title}}</td>
            <td>{{$material->type}}</td>
            <td>{{$material->link}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('editMaterial',['id'=>$material->id])}}">edit</a>
                <form action="{{ route('deleteMaterial', ['id' => $material->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


@endsection

