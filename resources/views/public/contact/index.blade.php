@extends('public.master')

@section('body')

<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container">
            <div class="row ">
                <div class="offset-3 col-md-6 p-4">
                <form action="{{url('create-contact')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Phone No</label>
                        <input type="text" class="form-control" placeholder="Enter phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control"placeholder="Enter email" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row">
                <div class="offset-3 col-md-6 p-4">
                    <table class="table">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->phone}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->message}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    </div>

@endsection