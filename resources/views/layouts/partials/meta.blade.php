<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
<meta name="description" content="{{ $description ?? '' }}">
<meta property="og:title" content="{{ $ogTitle ?? $title ?? '' }}"/>
<meta property="og:description" content="{{ $ogDescription ?? $description ?? '' }}"/>
<meta property="og:url" content="{{ request()->getUri() }}"/>
<meta property="og:type" content="website" />
