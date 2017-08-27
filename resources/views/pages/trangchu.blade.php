@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">

	@include('layout.slide')

	<div class="space20"></div>


	<div class="row main-left">
		@include('layout.menu')

		<div class="col-md-9">
			<div class="panel panel-default">            
				<div class="panel-heading" style="background-color:#337AB7; color:white;" >
					<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
				</div>

				<div class="panel-body">
					@foreach($theloai as $itemTl)
					@if(count($itemTl->loaitin) > 0)
					<!-- item -->
					<div class="row-item row">
						<h3>
							<a href="category.html">{{$itemTl->Ten}}</a> | 	
							@foreach($itemTl->loaitin as $itemLt)
							<small><a href="loaitin/{{$itemLt->id}}/{{$itemLt->TenKhongDau}}.html"><i>{{$itemLt->Ten}}</i></a>/</small>
							@endforeach
						</h3>
						<?php 
								//lưu 5 tin tức nổi bật mới nhất
						$data = $itemTl->tintuc->where('NoiBat',1)->sortByDesc('create_at')->take(5);
						$tintuc1 = $data->shift();
						?>
						<div class="col-md-8 border-right">
							<div class="col-md-5">
								<a href="tintuc/{{$tintuc1['id']}}/{{$tintuc1['TieuDeKhongDau']}}.html">
								<img class="img-responsive" src="upload/tintuc/{{$tintuc1['Hinh']}}" alt="">
								</a>
							</div>

							<div class="col-md-7">
								<h3>{{$tintuc1['TieuDe']}}</h3>
								<p>{{$tintuc1['TomTat']}}</p>
								<a class="btn btn-primary" href="tintuc/{{$tintuc1['id']}}/{{$tintuc1['TieuDeKhongDau']}}.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
							</div>

						</div>


						<div class="col-md-4">
							@foreach($data->all() as $tintuc)
								<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$tintuc['TieuDe']}}
									</h4>
								</a>
							@endforeach
						</div>

						<div class="break"></div>
					</div>
					<!-- end item -->
					@endif
					@endforeach

				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- end Page Content -->

@endsection