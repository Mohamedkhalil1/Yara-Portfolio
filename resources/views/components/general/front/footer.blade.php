@php
    use App\Models\Social;
    $socials = Social::all();
@endphp
<footer class="footer-area">
    <div class="container">
        <div class="">
            <div class="site-logo text-center py-4">
                <a href="javascript:"><img src="{{ getFile(\App\Models\Profile::first()->logo) }}" alt="logo"></a>
            </div>
            <div class="social text-center">
                <h5 class="text-uppercase">Follow me</h5>
                @foreach($socials as $social)
                    <a href="{{ $social->url }}" target="_blank">{!! \App\Enums\SocialMedia::getIcon($social->icon) !!} </a>
                @endforeach

            </div>
            <div class="copyrights text-center">
                <p class="para">
                    {{ now()->format('Y') }} &copy; {{ config('app.name') }}
                </p>
            </div>
        </div>
    </div>
</footer>
