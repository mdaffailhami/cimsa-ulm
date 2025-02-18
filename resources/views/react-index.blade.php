<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="javascript-dependent" content="true" />

    <title>{{ $meta['title'] }}</title>
    <link rel="icon" type="image/png" href="/favicon.png" />
    <meta name="author" content="CIMSA ULM" />
    <meta
      name="description"
      content="{{ $meta['description'] }}"
    />

    <meta property="og:title" content="{{ $meta['title'] }}">
    <meta property="og:description" content="{{ $meta['description'] }}">
    <meta property="og:image" content="{{ $meta['image'] }}">
    <meta property="og:type" content="{{ $meta['type'] }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <script type="module" crossorigin src="/assets/index-CM3fyZMd.js"></script>
    <link rel="stylesheet" crossorigin href="/assets/index-DOkt4nC3.css">
  </head>
  <body>
    <div id="app">
      <noscript>
        <p>
          This website content is based on JavaScript injection. So, you need to
          enable JavaScript to view the content.
        </p>
      </noscript>

      <p style="display: none">
        This website content is based on JavaScript injection. So, please wait
        until the javascript is fully loaded.
      </p>

      <style>
        #loader-container {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 95vh;
        }

        #loader {
          background-color: red;
          width: 90px;
          height: 40px;
          border-radius: 50%;
          animation: grow 0.75s linear infinite;
        }

        @keyframes grow {
          0% {
            transform: scale(0);
          }
          50% {
            opacity: 1;
            transform: none;
          }
        }
      </style>

      <div id="loader-container">
        <div id="loader"></div>
      </div>
    </div>
  </body>
</html>
