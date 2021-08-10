@extends('layouts.admin_layout')

@section('title', 'Головна')

@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Головна панель</h1>
          </div><!-- /.col -->          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Ім'я</th>
                      <th>Телефон</th>
                      <th>Дата</th>
                      <th>...</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; ?>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{$count}}</td>
                      <?php $count++; ?>
                      <td>{{$order->name}}</td>
                      <td>{{$order->phone}}</td>
                      <td>{{$order->created_at}}</td>
                      <td>
                        <form action="{{ route('order.destroy', $order)}}" method="post" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit">Видалити</button>
                        </form>
                      </td>                      
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>
              </div>
              


@endsection