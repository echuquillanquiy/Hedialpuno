@extends('layouts.panel')

@section('content')

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Nuevo paciente</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('patients') }}" class="btn btn-sm btn-default">
          Cancelar y volver
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

  	<form action="{{ url('patients') }}" method="POST">
  		@csrf
      <div class="row">
        <div class="form-group col-lg-9">
          <label for="name">Nombres y Apellidos</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group col-lg-3">
            <label for="dni">DNI</label>
            <input type="text" name="dni" class="form-control" value="{{ old('dni') }}" required>
        </div>
      </div>

      <div class="row">

        <div class="form-group col-lg-3">
            <label for="date_of_birth">Fecha de nacimiento</label>
          <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" onchange="Anos();" placeholder="Seleccionar fecha"
                id="date_of_birth" name="date_of_birth" type="text"
                value="{{ old('date_of_birth', date('Y-m-d')) }}"
                data-date-format="yyyy-mm-dd"
                >
          </div>
        </div>

        <div class="form-group col-lg-3">
            <label for="sex">Sexo</label>
            <select class="form-control" name="sex" data-toggle="select" title="Simple select" data-placeholder="Select a state" value="{{ old('sex') }}">
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
            </select>
        </div>

        <div class="form-group col-lg-1">
          <label for="age">Edad</label>
          <input type="text" name="age" id="age" class="form-control" value="" required>
        </div>

        <div class="form-group col-lg-5">
          <label for="address">Dirección</label>
          <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
        </div>
      </div>

      <div class="row">

        <div class="form-group col-lg-2">
          <label for="phone">Telefono</label>
          <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="form-group col-lg-2">
            <label for="civil_status">Estado Civil</label>
            <select class="form-control" name="civil_status" data-toggle="select" title="Simple select" data-placeholder="Select a state" value="{{ old('civil_status') }}">
                <option value="Casado">Casado</option>
                <option value="Soltero">Soltero</option>
                <option value="Conviviente">Conviviente</option>
                <option value="Viudo">Viudo</option>
                <option value="Divorciado">Divorciado</option>

            </select>
        </div>

        <div class="form-group col-lg-3">
            <label for="instruction">Grado de Instrucción</label>
            <select class="form-control" name="instruction" data-toggle="select" title="Simple select" data-placeholder="Select a state" value="{{ old('instruction') }}">
                <option value="Analfabeto">Analfabeto</option>
                <option value="Primaria Completa">Primaria Completa</option>
                <option value="Secundadia Completa">Secundadia Completa</option>
                <option value="Técnico Completa">Técnico Completa</option>
                <option value="Universitario Completa">Universitario Completa</option>
                <option value="Primaria Incompleta">Primaria Incompleta</option>
                <option value="Secundadia Incompleta">Secundadia Incompleta</option>
                <option value="Técnico Incompleta">Técnico Incompleta</option>
                <option value="Universitario Incompleta">Universitario Incompleta</option>
            </select>
        </div>

        <div class="form-group col-lg-5">
          <label for="ocupation">Ocupación Actual</label>
          <input type="text" name="ocupation" class="form-control" value="{{ old('ocupation') }}">
        </div>
      </div>

      <div class="row">

        <div class="form-group col-lg-4">
          <label for="condition">Condición Actual</label>
          <input type="text" name="condition" class="form-control" value="{{ old('condition') }}">
        </div>

        <div class="form-group col-lg-3">
          <label for="last_job">Fecha de último trabajo</label>
          <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker"
                id="last_job" name="last_job" type="text"
                value="{{ old('last_job', date('Y-m-d')) }}"
                data-date-format="yyyy-mm-dd"
                >
          </div>
        </div>

        <div class="form-group col-lg-5">
          <label for="hosp_origin">Hospital de origen</label>
          <input type="text" name="hosp_origin" class="form-control" value="{{ old('hosp_origin') }}" required>
        </div>

      </div>
      <div class="row">
          <div class="form-group col-lg-6">
            <label for="code">Codigo (Autogenerado)</label>
            <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
          </div>
      </div>


	  	<button type="submit" class="btn btn-primary">Guardar</button>
	  </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/edad.js') }}"></script>
@endsection
