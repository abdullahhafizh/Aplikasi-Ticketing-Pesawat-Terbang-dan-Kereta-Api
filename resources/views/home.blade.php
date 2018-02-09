@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reservasi</div>

                <div class="panel-body">
                    <form method="POST" action="{{ url('reservasi/create') }}">
                        <div class="modal-body">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('reservation_at') ? ' has-error' : '' }}">
                                <label for="reservation_at" class="control-label">Tempat Reservasi</label>

                                <input id="reservation_at" type="text" class="form-control" name="reservation_at" value="{{ old('reservation_at') }}" required autofocus>

                                @if ($errors->has('reservation_at'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reservation_at') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('customerid') ? ' has-error' : '' }}">
                                <label for="customerid" class="control-label">ID Pelanggan</label>
                                <small class="pull-right">Nama Pelanggan</small>

                                <input type="number" class="form-control" name="customerid" list="listcustomerid" 
                                id="customerid" value="{{ old('customerid') }}" autofocus required>
                                <datalist id="listcustomerid">
                                    @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{$customer->name}}</option>
                                    @endforeach
                                </datalist>

                                @if (session('customer_error'))
                                <span class="help-block">   
                                    <strong>{{ session('customer_error') }}</strong>
                                </span>
                                @endif

                                @if ($errors->has('customerid'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('customerid') }}</strong>
                                </span>
                                @endif                                            
                            </div>

                            <div class="form-group{{ $errors->has('routeid') ? ' has-error' : '' }}">
                                <label for="routeid" class="control-label">Pilih Rute </label>
                                <small class="pull-right">Departure : * | From : * | To : *</small>

                                <input type="number" class="form-control" name="routeid" list="listrouteid" id="routeid" value="{{ old('routeid') }}" autofocus required>
                                <datalist id="listrouteid">
                                    @foreach($routes as $route)
                                    <option value="{{ $route->id }}">Departure : {{$route->depart_at}} | From : {{$route->route_from}} | To : {{$route->route_to}}</option>
                                    @endforeach
                                </datalist>

                                @if (session('route_error'))
                                <span class="help-block">   
                                    <strong>{{ session('route_error') }}</strong>
                                </span>
                                @endif

                                @if ($errors->has('routeid'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('routeid') }}</strong>
                                </span>
                                @endif                                            
                            </div>

                            <div class="form-group{{ $errors->has('depart_at') ? ' has-error' : '' }}">
                                <label for="depart_at" class="control-label">Tempat Departure</label>

                                <input id="depart_at" type="text" class="form-control" name="depart_at" value="{{ old('depart_at') }}" required autofocus>

                                @if ($errors->has('depart_at'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('depart_at') }}</strong>
                                </span>
                                @endif                                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
