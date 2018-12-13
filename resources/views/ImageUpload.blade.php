<!DOCTYPE html>
<html>
<style>
    .fileSelect-btn {
        background: url({{url('/img/uploadicon.png')}}) no-repeat;
        background-size: 50%;
        background-position:center;
        height: 200px;
        width: 200px;
        cursor: pointer;
        border: none;
        position: absolute;
        margin:0 auto;
    }
    .avatar{
        height: 200px;
        width: 200px;
        margin: auto;


    }
    #avatarimage{
        background: url({{url('/img/uploadicon.png')}}) no-repeat;
        background-size: 50%;
        background-position:center;
    }
    .form-group{
        font-size: 13px;
    }
    .form-profile{
        font-size: 13px;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    .row{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
        margin-top: 1rem;
    }
    .form-profile-submit{
        margin:auto;
    }
    .btn{
        line-height: 20px;
        font-size: 13px;
    }
    .cut{
        margin-bottom: 0;
    }
    .marginauto{
        margin: auto;
    }
</style>
<body>
<div class="position-ref full-height">
    @yield('content')
    <div class="main">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container logintop">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-color">編輯個人資料</div>
                        <div class="card-body card-body-color">
                            {{--大頭貼顯示--}}
                            <div class="avatar">
                                @yield('content2')
                                <?
                                if (file_exists('images/'.$file)) {
                                ?>
                                    <img src="/images/<?php echo $file ?>" height="200" width="200" id="avatarimage" style="position: absolute">
                                <?}else{?>
                                <img src="" height="200" width="200" id="avatarimage" style=" position: absolute">
                                <?}?>
                                <input type="button" id="fileSelect" class="fileSelect-btn" style="display:none;"/>
                            </div>
                             {{--資料表單--}}
                            <form class="form-profile" method="POST" action="{{ route('croppie.upload-image') }}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <label for="product_id" class="col-sm-4 col-form-label text-md-right">Product ID：</label>
                                    <div class="col-md-6 ">
                                        <input type="text" name="product_id" value="{{ Auth::user()->product_id }}" readonly="readonly" required="required" autofocus="autofocus" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-mail：</label>
                                    <div class="col-md-6">
                                        <input type="text" name="email" value="{{ Auth::user()->email }}" readonly="readonly" required="required" autofocus="autofocus" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="location" class="col-sm-4 col-form-label text-md-right">地址：</label>
                                    <div class="col-md-6 ">
                                    <div id="twzipcode">
                                        <div data-role="county"
                                             data-name="county"
                                             data-value="{{$county}}">
                                        </div>
                                        <div data-role="district"
                                             data-name="district"
                                             data-value="{{$district}}">
                                        </div>
                                    </div>
                                        <input type="text" name="location" value="{{$location}}" required="required" placeholder="請輸入地址" autofocus="autofocus" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">關注新聞：</label>
                                    <div class="col-md-6">
                                        <input type='hidden' value='0' name='headline'>
                                        {{ Form::checkbox('headline', '1', $headline)}} 頭條&nbsp;
                                            <input type='hidden' value='0' name='international'>
                                        {{ Form::checkbox('international', '1', $international)}} 國際&nbsp;
                                        <input type='hidden' value='0' name='business'>
                                        {{ Form::checkbox('business', '1', $business)}} 商業&nbsp;
                                        <input type='hidden' value='0' name='science'>
                                        {{ Form::checkbox('science', '1', $science)}} 科學<br>
                                        <input type='hidden' value='0' name='entertainment'>
                                        {{ Form::checkbox('entertainment', '1', $entertainment)}} 娛樂&nbsp;
                                        <input type='hidden' value='0' name='sport'>
                                        {{ Form::checkbox('sport', '1', $sport)}} 體育&nbsp;
                                        <input type='hidden' value='0' name='health'>
                                        {{ Form::checkbox('health', '1', $health)}} 健康&nbsp;
                                        <input type='hidden' value='0' name='local'>
                                        {{ Form::checkbox('local', '1', $local)}} 地方
                                    </div>
                                </div>
                                <div class="form-profile row mb-0">
                                    <div class="col-md-3 form-profile-submit">
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <input type="file" name="image1" id="image1" accept="image/jpeg,image/jpg,image/png" style="display: none" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--彈出裁切頁面--}}
<div id="id01" class="modal">
    <form class="modal-content animate" action="{{ route('croppie.upload-image') }}" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="imgcontainer">
            <div class="form-group">
            <span onclick="document.getElementById('id01').style.display='none'" id="close" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="form-group">
            <div class="image-d" id="upload-demo" style="width:350px"></div>
            </div>
            <div class="form-group">
                <div class="image-d" id="image-cut"  style="width:200px; height:200px; display:none;"></div>
            </div>
            <div class="form-group">
                <input type="hidden" name="user" class="form-control" value={{ Auth::user()->email }} >
            </div>
            <div class="form-group">
                <input type="hidden" id="image" name="image" class="form-control" value="" >
            </div>
            <div class="form-group marginauto">
                <button class="cut btn btn-success" type="button" name="cut" id="cut" onclick="do_change(); return false;">裁切
                </button>
            </div>
            <div class="form-group">
            <button class="btn btn-success upload-image upload-result" type="submit" name="upload" id="upload" class="form-control" style="display:none;">Upload</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $("#twzipcode").twzipcode({
        "zipcodeIntoDistrict": true,
        "css": ["city form-control", "town form-control"],
        "countyName": "county", // 指定城市 select name
        "districtName": "district" // 指定地區 select name
    });

    //相片上傳動畫
    $('#avatarimage').mouseenter( function () {
        $('#fileSelect').stop();
        $('#avatarimage').stop();
        $('#fileSelect').fadeIn("slow");
        $('#avatarimage').fadeTo("slow",0.40);
    });
    $('#fileSelect').mouseleave( function () {
        $('#fileSelect').stop();
        $('#avatarimage').stop();
        $('#fileSelect').fadeOut("slow");
        $('#avatarimage').fadeTo("slow",1);
    });

    //  運用button方式上傳
    document.getElementById("fileSelect").addEventListener("click", function (e) {
        if (document.getElementById("image1")) {
            document.getElementById("image1").click();
        }
        e.preventDefault(); // prevent navigation to "#"
    }, false);

    //  安全機制
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 使用者上傳完圖片表現在網頁上
    // 並且作裁切
    $('#image1').on('change', function () {
        document.getElementById('id01').style.display='block';
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });


    // 裁切圖片&重新裁切&上傳
    $('.cut').on('click', function () {
        if(document.getElementById('cut').innerText === "重新裁切"){
            document.getElementById('upload').style.display = "none";
            document.getElementById('upload-demo').style.display = "block";
            document.getElementById('image-cut').style.display = "none";
            document.getElementById('cut').innerText="裁切";
        }else{
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            document.getElementById("image").value = resp;
            document.getElementById('image-cut').style.backgroundImage = "url(\""+resp+"\")";
            document.getElementById('image-cut').style.backgroundRepeat= "no-repeat";
        });
        document.getElementById('upload-demo').style.display = "none";
        document.getElementById('image-cut').style.display = "block";
        document.getElementById('cut').innerText="重新裁切";
        document.getElementById("upload").style.display = "block";
        }
    });

    //關閉頁面回復
    $('.close').on('click', function () {
        document.getElementById('upload-demo').style.display = "block";
        document.getElementById('image-cut').style.display = "none";
    });
</script>
{{--接收更換照片是否成功訊息並發出Alert--}}
@if(session()->has('message'))
    <script>
        swal({
            position: 'center',
            type: 'success',
            title:"{{ session('message')}}",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if(session()->has('error'))
    @foreach(session('error') as $y)
        <script>
            swal({
                position: 'center',
                type: 'error',
                title: '<?php echo $y ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endforeach
@endif
</body>
</html>