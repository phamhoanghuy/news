@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">
	<div class="row">

		<!-- Blog Post Content Column -->
		<div class="col-lg-9">

			<!-- Blog Post -->

			<!-- Title -->
			<h1>{{$tintuc->TieuDe}}</h1>

			<!-- Author -->
			<p class="lead">
				by <a href="#">admin</a>
			</p>

			<!-- Preview Image -->
			<img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

			<!-- Date/Time -->
			<p><span class="glyphicon glyphicon-time"></span> Posted on: {{$tintuc->create_at}}</p>
			<hr>

			<!-- Post Content -->
			<p class="lead">{!!$tintuc->NoiDung!!}</p>

			<hr>

			<!-- Blog Comments -->
			@if(Auth::check())
				<!-- Comments Form -->
				<div class="well">
					@if(session('thongbao'))
					<div class="alert">
						{{session('thongbao')}}
					</div>
					@endif
					<h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
					<form action="comment/{{$tintuc->id}}" method="post" role="form">
						<input type="hidden" name="_token" value="{{csrf_token()}}" name="">
						<div class="form-group">
							<textarea name="NoiDung" class="form-control" rows="3"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Gửi</button>
					</form>
				</div>
			@endif
			<hr>

			<!-- Posted Comments -->

			<!-- Comment -->
			@foreach($tintuc->comment as $itemCm)
			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object" src="http://placehold.it/64x64" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">{{$itemCm->user->name}}
						<small>
						{{$itemCm->create_at}}</small>
					</h4>
					{{$itemCm->NoiDung}}
				</div>
			</div>
			@endforeach

		</div>

		<!-- Blog Sidebar Widgets Column -->
		<div class="col-md-3">

			<div class="panel panel-default">
				<div class="panel-heading"><b>Tin liên quan</b></div>
				<div class="panel-body">
				@foreach($tinlienquan as $itemTlq)
					<!-- item -->
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-5">
							<a href="tintuc/{{$itemTlq->id}}/{{$itemTlq->TieuDeKhongDau}}.html">
								<img class="img-responsive" src="upload/tintuc/{{$itemTlq->Hinh}}" alt="">
							</a>
						</div>
						<div class="col-md-7">
							<a href="tintuc/{{$itemTlq->id}}/{{$itemTlq->TieuDeKhongDau}}.html"><b>{{$itemTlq->TieuDe}}</b></a>
						</div>
						<p>{{$itemTlq->TomTat}}</p>
						<div class="break"></div>
					</div>
					<!-- end item -->
				@endforeach
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><b>Tin nổi bật</b></div>
				<div class="panel-body">
				@foreach($tinnoibat as $itemTnb)
					<!-- item -->
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-5">
							<a href="tintuc/{{$itemTnb->id}}/{{$itemTnb->TieuDeKhongDau}}.html">
								<img class="img-responsive" src="upload/tintuc/{{$itemTnb->Hinh}}" alt="">
							</a>
						</div>
						<div class="col-md-7">
							<a href="tintuc/{{$itemTnb->id}}/{{$itemTnb->TieuDeKhongDau}}.html"><b>{{$itemTnb->TieuDe}}</b></a>
						</div>
						<p>{{$itemTnb->TomTat}}</p>
						<div class="break"></div>
					</div>
					<!-- end item -->
				@endforeach
				</div>
			</div>

		</div>

	</div>
	<!-- /.row -->
</div>
<!-- end Page Content -->
@endsection