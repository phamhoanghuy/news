@extends('layout.index')

@section('content')
<!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm kiếm: {{$tuKhoa}}</b></h4>
                    </div>

                    @foreach($tintuc as $itemTt)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="tintuc/{{$itemTt->id}}/{{$itemTt->TieuDeKhongDau}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$itemTt->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{{$itemTt->TieuDe}}</h3>
                            <p>{{$itemTt->TomTat}}</p>
                            <a class="btn btn-primary" href="tintuc/{{$itemTt->id}}/{{$itemTt->TieuDeKhongDau}}.html">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    
                    <!-- Pagination -->
                    <div class="row text-center">
                        {{$tintuc->links()}}
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

@endsection