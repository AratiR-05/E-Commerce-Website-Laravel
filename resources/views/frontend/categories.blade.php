@extends('frontend.master')
@section('body')
    <main>

        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Category</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ url('categories') }}">Category</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="listing-area pt-50 pb-50">
            <div class="container">
                <div class="row">

                    <div class="col-xl-3 col-lg-4 col-md-4">

                        <div class="category-listing mb-50">

                            <div class="single-listing">

                                <div class="select-Categories pb-30">
                                    <div class="select-job-items2 mb-30">
                                        <div class="col-xl-12">
                                            <select name="select2">
                                                <option value>Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="select-job-items2 mb-30">
                                        <div class="col-xl-12">
                                            <select name="select2">
                                                <option value>Type</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="select-job-items2 mb-30">
                                        <div class="col-xl-12">
                                            <select name="select2">
                                                <option value>Size</option>
                                                @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="select-job-items2 mb-30">
                                        <div class="col-xl-12">
                                            <select name="select2">
                                                <option value>Color</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40">
                                    <div class="small-tittle">
                                        <h4>Filter by Price</h4>
                                    </div>
                                    <div class="widgets_inner">
                                        <div class="range_item">
                                            <input type="text" class="js-range-slider" value />
                                            <div class="d-flex align-items-center">
                                                <div class="price_value d-flex justify-content-center">
                                                    <input type="text" class="js-input-from" id="amount" readonly />
                                                    <span>to</span>
                                                    <input type="text" class="js-input-to" id="amount" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>


                                {{-- <div class="select-Categories pb-20">
                                    <div class="small-tittle mb-20">
                                        <h4>Filter by Brand</h4>
                                    </div>
                                    <label class="container">Green Publications
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Anondo Publications
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Rinku Publications
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Sheba Publications
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Red Publications
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> --}}

                            </div>
                        </div>

                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <div class="latest-items latest-items2">
                            <div class="row">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($items as $item)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <div class="properties pb-30">
                                            <div class="properties-card">
                                                <div class="properties-img">
                                                    <a
                                                        href="{{ url('pro_details') }}/{{ $datas->name }}/{{ $item->proid }}"><img
                                                            src="{{ asset('storage/app') }}/{{ $item->imgpath }}" alt></a>
                                                    <div class="socal_icon">
                                                        <a href="#"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" onclick="viewAlert()"><i class="ti-heart"></i></a>
                                                        <a href="#"><i class="ti-zoom-in"></i></a>
                                                    </div>
                                                </div>
                                                <div class="properties-caption properties-caption2">
                                                    <h3><a href="{{ url('pro_details') }}">{{ $item->name }}</a></h3>
                                                    <div class="properties-footer">
                                                        <div class="price">
                                                            <span>{{ $item->price }} <span>$120.00</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @php
                                $i++;
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
@push('js')
    <script>
        function viewAlert() {
            var myText = "Item Added in Wishlist!";
            alert(myText);
        }
    </script>
@endpush
