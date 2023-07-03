<div class="">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="">{{ $locale_name }}</span>
        @else
            <a class="navbar-btn" style="margin-left: -15px;" href="language/{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
</div>