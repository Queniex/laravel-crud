    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel & Vue Js</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500;600;700;800;900&family=Poppins:wght@100;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* *{
            border: 1px red solid;
        } */

        body {
                font-family: 'Poppins', sans-serif;
            }

        hr { 
            background-color: white; 
            height: 1px; 
            border: 0; 
        }

        a.router-link-exact-active {
            background-color: white;
            color: black !important;
            font-weight: 500px; 
        }
    </style>

    <script>
        // nonce="b68b29ee-eaf1-43e0-b6f6-73dab2782d92">(function (w, d) { !function (U, V, W, X) { U[W] = U[W] || {}; U[W].executed = []; U.zaraz = { deferred: [], listeners: [] }; U.zaraz.q = []; U.zaraz._f = function (Y) { return async function () { var Z = Array.prototype.slice.call(arguments); U.zaraz.q.push({ m: Y, a: Z }) } }; for (const $ of ["track", "set", "debug"]) U.zaraz[$] = U.zaraz._f($); U.zaraz.init = () => { var ba = V.getElementsByTagName(X)[0], bb = V.createElement(X), bc = V.getElementsByTagName("title")[0]; bc && (U[W].t = V.getElementsByTagName("title")[0].text); U[W].x = Math.random(); U[W].w = U.screen.width; U[W].h = U.screen.height; U[W].j = U.innerHeight; U[W].e = U.innerWidth; U[W].l = U.location.href; U[W].r = V.referrer; U[W].k = U.screen.colorDepth; U[W].n = V.characterSet; U[W].o = (new Date).getTimezoneOffset(); if (U.dataLayer) for (const bg of Object.entries(Object.entries(dataLayer).reduce(((bh, bi) => ({ ...bh[1], ...bi[1] })), {}))) zaraz.set(bg[0], bg[1], { scope: "page" }); U[W].q = []; for (; U.zaraz.q.length;) { const bj = U.zaraz.q.shift(); U[W].q.push(bj) } bb.defer = !0; for (const bk of [localStorage, sessionStorage]) Object.keys(bk || {}).filter((bm => bm.startsWith("_zaraz_"))).forEach((bl => { try { U[W]["z_" + bl.slice(7)] = JSON.parse(bk.getItem(bl)) } catch { U[W]["z_" + bl.slice(7)] = bk.getItem(bl) } })); bb.referrerPolicy = "origin"; bb.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(U[W]))); ba.parentNode.insertBefore(bb, ba) };["complete", "interactive"].includes(V.readyState) ? zaraz.init() : U.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);
    </script>