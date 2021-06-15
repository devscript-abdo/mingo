<div class="ps-breadcrumb">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{$product->category->url}}">{{$product->category->field('name')}}</a></li>
           
            <li>{{$product->field('name')}}</li>
        </ul>
    </div>
</div>