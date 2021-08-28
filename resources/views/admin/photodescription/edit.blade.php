@extends('layouts.admin_layout')

@section('title', 'Фотографії - Блог')

@section('content')


@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Фото - опис</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('photodescription.update')}}">
                <div class="card-body">
                  <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="exampleInputEmail1">Заголовок</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введіть заголовок" name="title" value="{{ $photoDescription->title }}">
                  </div>
                  <div class="form-group">
                      <span style="display:inline-block; width:83%;">
                        <label for="exampleInputPassword1">Опис</label>
                        <textarea type="text" class="form-control" id="exampleInputPassword1" rows="5" placeholder="Опис" name="description" >{{ $photoDescription->description }}</textarea>
                      </span>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
              </form>
            </div>

@endsection

