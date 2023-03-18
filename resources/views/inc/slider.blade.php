<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($sliders as $key => $slider)
            
        <div class="carousel-item {{ $key == 0 ? 'active' : ""}}">
            <img src="{{ asset("$slider->image") }}" class="d-block w-100" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        @if ($slider->strongtitle)
                        <span>{{$slider->strongtitle}}</span>
                        @endif
                    </h1>
                    <h1>
                        @if ($slider->title)
                        {{$slider->title}}
                        @endif
                    </h1>
                    
                    @if ($slider->description)
                    <p>
                        {{$slider->description}}
                    </p>
                    @endif
                    
                    @if ($slider->link)
                    <div>
                        <a href="{{url($slider->link)}}" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
</div>
