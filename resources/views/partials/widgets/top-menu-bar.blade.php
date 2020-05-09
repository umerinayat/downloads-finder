<div class="container-fluid">
    <div class="row text-center border">
    <div class="col-lg-1"></div>
        @foreach( $categories as $cat )
            <div class="col-lg-1 p-3">
                {{$cat->name}}

    

            </div>
        @endforeach
    </div>
</div>
