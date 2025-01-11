@extends('layouts.main')

@section('content')

    <div class="container py-5">
        <div class="row">
          @foreach($tag_ids as $current_tag_search)
                @if(!empty($result) && $result->count() >= 1)
            @foreach($result as $product)
              @foreach($product->tags as $product_tag)
                            @if($current_tag_search == $product_tag->id)

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="card">
                        <img src="{{asset('storage/' . $product->image)}}"
                             class="card-img-top" alt="Laptop" />
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="small"><a href="#!" class="text-muted">{{$product->category->title}}</a></p>
                                @if($product->old_price > 0 && $product->old_price != null)
                                    <p class="small text-danger"><s>{{$product->old_price}}</s></p>
                                @endif
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{$product->title}}</h5>
                                <h5 class="text-dark mb-0">{{$product->price}}</h5>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">В наличии: <span class="fw-bold">{{$product->avaible}}</span></p>
                                <div class="ms-auto text-warning d-flex">
                                    @foreach($product->colors as $color)
                                        <div class="product_color_box mr-2" style="background-color: {{$color->color_id}}"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            @else
                                not found
                            @endif
              @endforeach
            @endforeach
            @else
            Ничего не найдено...
            @endif
          @endforeach
        </div>

@endsection
