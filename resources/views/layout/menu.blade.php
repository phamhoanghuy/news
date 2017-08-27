<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
           Menu
       </li>

       @foreach($theloai as $itemTl)
            <?php //kiểm tra nếu thể loại không có loại tin thì không hiển thị ra menu ?>
            @if(count($itemTl->loaitin) > 0)
           <li href="#" class="list-group-item menu1">
               {{$itemTl->Ten}}
           </li>

           <ul>
                @foreach($itemTl->loaitin as $itemLt)
                    <li class="list-group-item">
                     <a href="loaitin/{{$itemLt->id}}/{{$itemLt->TenKhongDau}}.html">{{$itemLt->Ten}}</a>
                    </li>
                @endforeach
         </ul>
        @endif
     @endforeach
</ul>
</div>