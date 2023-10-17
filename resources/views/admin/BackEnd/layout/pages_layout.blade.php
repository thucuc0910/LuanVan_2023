<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/back/vendors/images/logo1.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/back/vendors/images/logo1.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/back/vendors/images/logo1.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="/back/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/back/src/plugins/datatables/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <link rel="stylesheet" href="/extra_assets/ijabo/ijabo.min.css">
    <link rel="stylesheet" href="/extra_assets/ijaboCropTool/ijaboCropTool.min.css">
    {{-- Cuc add start --}}

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    {{-- Datatable --}}
    {{-- bootstrap select --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}

    <link rel="stylesheet" type="text/css" href="/back/src/plugins/select2/dist/css/select2.min.css">

    <link rel="stylesheet" type="text/css" href="/back/src/plugins/switchery/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="/back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" type="text/css" href="/back/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">
    {{-- <link rel="stylesheet" href="/switchery/switchery.min.css" /> --}}



    {{-- Cuc add end --}}

    {{-- Linh --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    {{-- Linh --}}

    @yield('style')

    <style type="text/css">
        .select2-hidden-accessible {
            position:  !important;
        }

        .apexcharts-canvas {
            position: relative;
            user-select: none;
            /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
        }

        /* scrollbar is not visible by default for legend, hence forcing the visibility */
        .apexcharts-canvas ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 6px;
        }

        .apexcharts-canvas ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, .5);
            box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        }

        .apexcharts-canvas.apexcharts-theme-dark {
            background: #343F57;
        }

        .apexcharts-inner {
            position: relative;
        }

        .apexcharts-text tspan {
            font-family: inherit;
        }

        .legend-mouseover-inactive {
            transition: 0.15s ease all;
            opacity: 0.20;
        }

        .apexcharts-series-collapsed {
            opacity: 0;
        }

        .apexcharts-gridline,
        .apexcharts-annotation-rect {
            pointer-events: none;
        }

        .apexcharts-tooltip {
            border-radius: 5px;
            box-shadow: 2px 2px 6px -4px #999;
            cursor: default;
            font-size: 14px;
            left: 62px;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            top: 20px;
            overflow: hidden;
            white-space: nowrap;
            z-index: 12;
            transition: 0.15s ease all;
        }

        .apexcharts-tooltip.apexcharts-theme-light {
            border: 1px solid #e3e3e3;
            background: rgba(255, 255, 255, 0.96);
        }

        .apexcharts-tooltip.apexcharts-theme-dark {
            color: #fff;
            background: rgba(30, 30, 30, 0.8);
        }

        .apexcharts-tooltip * {
            font-family: inherit;
        }

        .apexcharts-tooltip .apexcharts-marker,
        .apexcharts-area-series .apexcharts-area,
        .apexcharts-line {
            pointer-events: none;
        }

        .apexcharts-tooltip.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }

        .apexcharts-tooltip-title {
            padding: 6px;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
            background: #ECEFF1;
            border-bottom: 1px solid #ddd;
        }

        .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
            background: rgba(0, 0, 0, 0.7);
            border-bottom: 1px solid #333;
        }

        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            display: inline-block;
            font-weight: 600;
            margin-left: 5px;
        }

        .apexcharts-tooltip-text-z-label:empty,
        .apexcharts-tooltip-text-z-value:empty {
            display: none;
        }

        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            font-weight: 600;
        }

        .apexcharts-tooltip-marker {
            width: 12px;
            height: 12px;
            position: relative;
            top: 0px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .apexcharts-tooltip-series-group {
            padding: 0 10px;
            display: none;
            text-align: left;
            justify-content: left;
            align-items: center;
        }

        .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
            opacity: 1;
        }

        .apexcharts-tooltip-series-group.apexcharts-active,
        .apexcharts-tooltip-series-group:last-child {
            padding-bottom: 4px;
        }

        .apexcharts-tooltip-series-group-hidden {
            opacity: 0;
            height: 0;
            line-height: 0;
            padding: 0 !important;
        }

        .apexcharts-tooltip-y-group {
            padding: 6px 0 5px;
        }

        .apexcharts-tooltip-candlestick {
            padding: 4px 8px;
        }

        .apexcharts-tooltip-candlestick>div {
            margin: 4px 0;
        }

        .apexcharts-tooltip-candlestick span.value {
            font-weight: bold;
        }

        .apexcharts-tooltip-rangebar {
            padding: 5px 8px;
        }

        .apexcharts-tooltip-rangebar .category {
            font-weight: 600;
            color: #777;
        }

        .apexcharts-tooltip-rangebar .series-name {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .apexcharts-xaxistooltip {
            opacity: 0;
            padding: 9px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
            transition: 0.15s ease all;
        }

        .apexcharts-xaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }

        .apexcharts-xaxistooltip:after,
        .apexcharts-xaxistooltip:before {
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .apexcharts-xaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-left: -6px;
        }

        .apexcharts-xaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-left: -7px;
        }

        .apexcharts-xaxistooltip-bottom:after,
        .apexcharts-xaxistooltip-bottom:before {
            bottom: 100%;
        }

        .apexcharts-xaxistooltip-top:after,
        .apexcharts-xaxistooltip-top:before {
            top: 100%;
        }

        .apexcharts-xaxistooltip-bottom:after {
            border-bottom-color: #ECEFF1;
        }

        .apexcharts-xaxistooltip-bottom:before {
            border-bottom-color: #90A4AE;
        }

        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-xaxistooltip-top:after {
            border-top-color: #ECEFF1
        }

        .apexcharts-xaxistooltip-top:before {
            border-top-color: #90A4AE;
        }

        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
            border-top-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
            border-top-color: rgba(0, 0, 0, 0.5);
        }


        .apexcharts-xaxistooltip.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }

        .apexcharts-yaxistooltip {
            opacity: 0;
            padding: 4px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
        }

        .apexcharts-yaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }

        .apexcharts-yaxistooltip:after,
        .apexcharts-yaxistooltip:before {
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .apexcharts-yaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-top: -6px;
        }

        .apexcharts-yaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-top: -7px;
        }

        .apexcharts-yaxistooltip-left:after,
        .apexcharts-yaxistooltip-left:before {
            left: 100%;
        }

        .apexcharts-yaxistooltip-right:after,
        .apexcharts-yaxistooltip-right:before {
            right: 100%;
        }

        .apexcharts-yaxistooltip-left:after {
            border-left-color: #ECEFF1;
        }

        .apexcharts-yaxistooltip-left:before {
            border-left-color: #90A4AE;
        }

        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
            border-left-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
            border-left-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-yaxistooltip-right:after {
            border-right-color: #ECEFF1;
        }

        .apexcharts-yaxistooltip-right:before {
            border-right-color: #90A4AE;
        }

        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
            border-right-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
            border-right-color: rgba(0, 0, 0, 0.5);
        }

        .apexcharts-yaxistooltip.apexcharts-active {
            opacity: 1;
        }

        .apexcharts-yaxistooltip-hidden {
            display: none;
        }

        .apexcharts-xcrosshairs,
        .apexcharts-ycrosshairs {
            pointer-events: none;
            opacity: 0;
            transition: 0.15s ease all;
        }

        .apexcharts-xcrosshairs.apexcharts-active,
        .apexcharts-ycrosshairs.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }

        .apexcharts-ycrosshairs-hidden {
            opacity: 0;
        }

        .apexcharts-zoom-rect {
            pointer-events: none;
        }

        .apexcharts-selection-rect {
            cursor: move;
        }

        .svg_select_points,
        .svg_select_points_rot {
            opacity: 0;
            visibility: hidden;
        }

        .svg_select_points_l,
        .svg_select_points_r {
            cursor: ew-resize;
            opacity: 1;
            visibility: visible;
            fill: #888;
        }

        .apexcharts-canvas.apexcharts-zoomable .hovering-zoom {
            cursor: crosshair
        }

        .apexcharts-canvas.apexcharts-zoomable .hovering-pan {
            cursor: move
        }


        .apexcharts-zoom-icon,
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon,
        .apexcharts-reset-icon,
        .apexcharts-pan-icon,
        .apexcharts-selection-icon,
        .apexcharts-menu-icon,
        .apexcharts-toolbar-custom-icon {
            cursor: pointer;
            width: 20px;
            height: 20px;
            line-height: 24px;
            color: #6E8192;
            text-align: center;
        }


        .apexcharts-zoom-icon svg,
        .apexcharts-zoomin-icon svg,
        .apexcharts-zoomout-icon svg,
        .apexcharts-reset-icon svg,
        .apexcharts-menu-icon svg {
            fill: #6E8192;
        }

        .apexcharts-selection-icon svg {
            fill: #444;
            transform: scale(0.76)
        }

        .apexcharts-theme-dark .apexcharts-zoom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomout-icon svg,
        .apexcharts-theme-dark .apexcharts-reset-icon svg,
        .apexcharts-theme-dark .apexcharts-pan-icon svg,
        .apexcharts-theme-dark .apexcharts-selection-icon svg,
        .apexcharts-theme-dark .apexcharts-menu-icon svg,
        .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
            fill: #f3f4f5;
        }

        .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
            fill: #008FFB;
        }

        .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
        .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg,
        .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
        .apexcharts-theme-light .apexcharts-menu-icon:hover svg {
            fill: #333;
        }

        .apexcharts-selection-icon,
        .apexcharts-menu-icon {
            position: relative;
        }

        .apexcharts-reset-icon {
            margin-left: 5px;
        }

        .apexcharts-zoom-icon,
        .apexcharts-reset-icon,
        .apexcharts-menu-icon {
            transform: scale(0.85);
        }

        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
            transform: scale(0.7)
        }

        .apexcharts-zoomout-icon {
            margin-right: 3px;
        }

        .apexcharts-pan-icon {
            transform: scale(0.62);
            position: relative;
            left: 1px;
            top: 0px;
        }

        .apexcharts-pan-icon svg {
            fill: #fff;
            stroke: #6E8192;
            stroke-width: 2;
        }

        .apexcharts-pan-icon.apexcharts-selected svg {
            stroke: #008FFB;
        }

        .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
            stroke: #333;
        }

        .apexcharts-toolbar {
            position: absolute;
            z-index: 11;
            top: 0px;
            right: 3px;
            max-width: 176px;
            text-align: right;
            border-radius: 3px;
            padding: 0px 6px 2px 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .apexcharts-toolbar svg {
            pointer-events: none;
        }

        .apexcharts-menu {
            background: #fff;
            position: absolute;
            top: 100%;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 3px;
            right: 10px;
            opacity: 0;
            min-width: 110px;
            transition: 0.15s ease all;
            pointer-events: none;
        }

        .apexcharts-menu.apexcharts-menu-open {
            opacity: 1;
            pointer-events: all;
            transition: 0.15s ease all;
        }

        .apexcharts-menu-item {
            padding: 6px 7px;
            font-size: 12px;
            cursor: pointer;
        }

        .apexcharts-theme-light .apexcharts-menu-item:hover {
            background: #eee;
        }

        .apexcharts-theme-dark .apexcharts-menu {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
        }

        @media screen and (min-width: 768px) {

            .apexcharts-canvas:hover .apexcharts-toolbar {
                opacity: 1;
            }
        }

        .apexcharts-datalabel.apexcharts-element-hidden {
            opacity: 0;
        }

        .apexcharts-pie-label,
        .apexcharts-datalabels,
        .apexcharts-datalabel,
        .apexcharts-datalabel-label,
        .apexcharts-datalabel-value {
            cursor: default;
            pointer-events: none;
        }

        .apexcharts-pie-label-delay {
            opacity: 0;
            animation-name: opaque;
            animation-duration: 0.3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease;
        }

        .apexcharts-canvas .apexcharts-element-hidden {
            opacity: 0;
        }

        .apexcharts-hide .apexcharts-series-points {
            opacity: 0;
        }

        .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-radar-series path,
        .apexcharts-radar-series polygon {
            pointer-events: none;
        }

        /* markers */

        .apexcharts-marker {
            transition: 0.15s ease all;
        }

        @keyframes opaque {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Resize generated styles */
        @keyframes resizeanim {
            from {
                opacity: 0;
            }

            to {
                opacity: 0;
            }
        }

        .resize-triggers {
            animation: 1ms resizeanim;
            visibility: hidden;
            opacity: 0;
        }

        .resize-triggers,
        .resize-triggers>div,
        .contract-trigger:before {
            content: " ";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .resize-triggers>div {
            background: #eee;
            overflow: auto;
        }

        .contract-trigger:before {
            width: 200%;
            height: 200%;
        }

        .select2-container .select2-selection--single {
            height: 45px;
            border-color: #d4d4d4;
            outline: 0;
            letter-spacing: .035em;
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple,
        .select2-dropdown {
            border-color: #d4d4d4
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 43px
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #1b00ff;
            color: #fff;
            border-color: #1b00ff
        }

        .select2-container--default .select2-selection--multiple {
            min-height: 45px;
            border-color: #d4d4d4
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding-top: 3px
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff
        }

        .select2-dropdown {
            -webkit-box-shadow: 0 0 28px rgba(0, 0, 0, .1);
            box-shadow: 0 0 28px rgba(0, 0, 0, .1)
        }

        .select2-search--dropdown {
            padding: 10px
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-radius: 5px
        }

        .bootstrap-select .dropdown-menu li .dropdown-item.active:hover,
        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #1b00ff;
            color: #fff
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #1b00ff
        }

        .bootstrap-select.btn-group .dropdown-menu.inner,
        table.dataTable>tbody>tr.child ul.dtr-details .dtr-title {
            display: block
        }

        .bootstrap-select .dropdown-toggle:focus {
            outline: 0 !important
        }

        .bootstrap-select .dropdown-header {
            color: #222;
            font-weight: 700;
            font-size: 15px
        }

        .bootstrap-select .dropdown-menu li .dropdown-item:hover {
            color: #1b00ff
        }

        .bootstrap-select.show-tick .dropdown-menu .selected span.check-mark {
            top: 13px
        }

        .bootstrap-select .bs-ok-default:after {
            border-width: 0 2px 2px 0
        }

        .dropup .dropdown-toggle::after {
            content: "\f107";
            font-family: "FontAwesome";
            vertical-align: unset;
            width: auto;
            height: auto;
            border: 0 !important
        }

        .bootstrap-select.btn-group .dropdown-menu li a {
            display: block;
            font-size: 15px;
            font-weight: 400;
            padding: .55rem 1rem;
            color: #667f87;
            font-family: 'Inter', sans-serif;
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out
        }

        .bootstrap-select.btn-group .dropdown-menu li.divider {
            border: 1px solid #eaeaea
        }

        .bootstrap-select.btn-group .dropdown-menu li.selected a {
            background: #e1e1f5;
            color: #131e22
        }

        .bootstrap-select.btn-group .dropdown-menu li.disabled a {
            color: #cecece
        }

        .bootstrap-select.btn-group .dropdown-menu li a:hover {
            background: #e1e1f5;
            color: #131e22
        }

        .bootstrap-select.btn-group .dropdown-menu li a span.check-mark {
            background: url(../images/check-mark-green.png);
            width: 15px;
            height: 15px;
            background-size: contain
        }
    </style>

    <!-- End Google Tag Manager -->
    @livewireStyles

    @stack('styleSheet')
</head>

<body>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="/back/vendors/images/logo.png" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}

    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
            <div class="header-search">
                <form>
                    <div class="form-group mb-0">
                        <i class="dw dw-search2 search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Search Here" />
                        <div class="dropdown">
                            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                                <i class="ion-arrow-down-c"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text" />
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/img.jpg" alt="" />
                                        <h3>John Doe</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/photo1.jpg" alt="" />
                                        <h3>Lea R. Frith</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/photo2.jpg" alt="" />
                                        <h3>Erik L. Richards</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/photo3.jpg" alt="" />
                                        <h3>John Doe</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/photo4.jpg" alt="" />
                                        <h3>Renee I. Hansen</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/img.jpg" alt="" />
                                        <h3>Vicki M. Coleman</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <livewire:admin-seller-header-profile-info> --}}
            @livewire('admin-staff-header-profile-info')


        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">
                    User Interface Settings
                </span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">
                        White
                    </a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">
                        Dark
                    </a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i
                                class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i
                                class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i
                                class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i
                                class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="index.html">
                {{-- <img src="/back/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" /> --}}
                <img src="/back/vendors/images/logo.png" alt="" class="dark-logo" />
                <img src="/back/vendors/images/logo-white.png" alt="" class="light-logo" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    {{-- Sidebar 1 --}}
                    {{-- @if (Route::is('admin.*')) --}}
                    <li>
                        <a href="{{ route('admin.home') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.home') ? 'active' : '' }}">
                            <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-graph-up {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                            </span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    {{-- @else --}}
                    {{-- @endif --}}

                    {{-- Sidebar 2 --}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.roles.*') ? 'active' : '' }}">
                            <span class="micon bi bi-person-check-fill"></span><span class="mtext">Quản lý
                                quyền</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.users.*') ? 'active' : '' }}">
                            <span class="micon bi bi-people-fill"></span><span class="mtext">Quản lý Admin</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.accounts.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.accounts.*') ? 'active' : '' }}">
                            <span class="micon bi bi-people"></span><span class="mtext">Quản lý User</span>
                        </a>
                    </li>
                    {{-- Sidebar 3 --}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="{{ route('admin.comments.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.comments.*') ? 'active' : '' }}">
                            <span class="micon bi bi-chat-text"></span><span class="mtext">Quản lý bình luận</span>
                        </a>
                    </li>

                    {{-- Sidebar 4 --}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="{{ route('admin.sliders.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.sliders.*') ? 'active' : '' }}">
                            <span class="micon bi bi-images"></span><span class="mtext">Sliders</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.coupons.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.coupons.*') ? 'active' : '' }}">
                            <span class="micon bi bi-qr-code-scan"></span><span class="mtext">Voucher</span>
                        </a>
                    </li>




                    {{-- Sidebar 5 --}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.categories.*') ? 'active' : '' }}">
                            <span class="micon bi bi-menu-button-wide-fill"></span><span class="mtext">Danh
                                mục</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.products.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.products.*') ? 'active' : '' }}">
                            <span class="micon bi bi-archive-fill"></span><span class="mtext">Sản phẩm</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.sizes.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.sizes.*') ? 'active' : '' }}">
                            <span class="micon bi bi-123"></span><span class="mtext">Size</span>
                        </a>
                    </li>


                    {{-- Sidebar 6 --}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <a href="{{ route('admin.providers.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.providers.*') ? 'active' : '' }}">
                            <span class="micon bi bi-truck"></span><span class="mtext">Nhà cung cấp</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/warehouses/index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.warehouses.*') ? 'active' : '' }}">
                            <span class="micon bi bi-boxes"></span><span class="mtext">Kho</span>
                            {{-- <i class="icon-copy bi bi-cart4"></i> --}}
                        </a>
                    </li>


                    {{-- Sidebar 7 --}}

                    {{-- <i class="icon-copy bi bi-clipboard2-data-fill"></i> --}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <a href="{{ route('admin.orders.index') }}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.orders.*') ? 'active' : '' }}">
                            <span class="micon bi bi-cart4"></span><span class="mtext">Đơn hàng</span>
                            {{-- <i class="icon-copy bi bi-cart4"></i> --}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div>
                    @yield('content')
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                MyProject By
                <a href="https://github.com/thucuc0910" target="_blank">Chiêm Thị Thu Cúc</a>
            </div>
        </div>
    </div>

    <script>
        if (navigator.userAgent.indexOf("Firefox") != -1) {
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function() {
                history.pushState(null, null, document.URL);
            });
        }
    </script>
    {{-- Add --}}
    <script>
        window.addEventListener('showToastr', function(event) {
            toastr.remove();
            if (event.detail.type === 'info') {
                toastr.info(event.detail.message);
            } else if (event.detail.type === 'success') {
                toastr.success(event.detail.message)
            } else if (event.detail.type === 'error') {
                toastr.error(event.detail.message)
            } else if (event.detail.type === 'warning') {
                toastr.warning(event.detail.message)
            } else {
                return false;
            }
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>

    <script src="{{ asset('bootstrap/jquery-3.7.0.js') }}"></script>

    <!-- js -->
    <script src="/back/vendors/scripts/core.js"></script>
    <script src="/back/vendors/scripts/script.min.js"></script>
    <script src="/back/vendors/scripts/process.js"></script>
    <script src="/back/vendors/scripts/script.min.js"></script>


    {{-- bootstrap select --}}
    <script src="/switchery/switchery.min.js"></script>

    <script src="/back/vendors/scripts/layout-settings.js"></script>
    <script src="/back/vendors/scripts/datatable-setting.js"></script>
    <script src="/back/vendors/scripts/steps-setting.js"></script>
    <script src="/back/vendors/scripts/apexcharts-setting.js"></script>
    <script src="/back/vendors/scripts/highchart-setting.js"></script>
    <script src="/back/vendors/scripts/jvectormap-setting.js"></script>
    <script src="/back/vendors/scripts/knob-chart-setting.js"></script>
    <script src="/back/vendors/scripts/range-slider-setting.js"></script>

    <script src="/step/jquery.steps.min.js"></script>
    <script src="/extra_assets/ijabo/ijabo.min.css"></script>
    <script src="/extra_assets/ijabo/jquery.ijaboViewer.min.js"></script>
    <script src="/extra_assets/ijaboCropTool/ijaboCropTool.min.js"></script>

    <script src="/back/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="/back/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/back/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="/back/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="/back/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="/back/vendors/scripts/dashboard3.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <script src="/back/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <ins class="adsbygoogle adsbygoogle-noablate" style="display: none !important;" data-adsbygoogle-status="done"
        data-ad-status="unfilled">
        <div id="aswift_0_host"
            style="border: none; height: 0px; width: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block;"
            tabindex="0" title="Advertisement" aria-label="Advertisement"><iframe id="aswift_0" name="aswift_0"
                browsingtopics="true"
                style="left:0;position:absolute;top:0;border:0;width:undefinedpx;height:undefinedpx;"
                sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation"
                frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0"
                allowtransparency="true" scrolling="no" allow="attribution-reporting"
                src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-2973766580778258&amp;output=html&amp;adk=1812271804&amp;adf=3025194257&amp;lmt=1690032792&amp;plat=1%3A16786432%2C2%3A16786432%2C3%3A2097152%2C4%3A2097152%2C9%3A32776%2C16%3A8388608%2C17%3A32%2C24%3A32%2C25%3A32%2C30%3A32768%2C32%3A32%2C41%3A32%2C42%3A32&amp;format=0x0&amp;url=file%3A%2F%2F%2FD%3A%2FLu%25E1%25BA%25ADn%2520V%25C4%2583n%2Ftemplate%2Fdeskapp-master%2Fdeskapp-master%2Fdatatable.html&amp;ea=0&amp;pra=5&amp;wgl=1&amp;easpi=1&amp;asro=0&amp;asiscm=1&amp;aslmt=0.4&amp;asamt=-1&amp;asedf=0&amp;asefa=1&amp;aseiel=1&amp;uach=WyJBbmRyb2lkIiwiNi4wIiwiIiwiTmV4dXMgNSIsIjExNi4wLjU4NDUuMTExIixbXSwxLG51bGwsIjY0IixbWyJDaHJvbWl1bSIsIjExNi4wLjU4NDUuMTExIl0sWyJOb3QpQTtCcmFuZCIsIjI0LjAuMC4wIl0sWyJHb29nbGUgQ2hyb21lIiwiMTE2LjAuNTg0NS4xMTEiXV0sMF0.&amp;dt=1696070358323&amp;bpp=5&amp;bdt=200&amp;idt=388&amp;shv=r20230927&amp;mjsv=m202309210101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;nras=1&amp;correlator=141275544180&amp;frm=20&amp;pv=2&amp;ga_vid=697196670.1696070359&amp;ga_sid=1696070359&amp;ga_hid=393351800&amp;ga_fc=0&amp;u_tz=420&amp;u_his=28&amp;u_h=242&amp;u_w=1496&amp;u_ah=242&amp;u_aw=1496&amp;u_cd=30&amp;u_sd=2&amp;dmc=8&amp;adx=-12245933&amp;ady=-12245933&amp;biw=1496&amp;bih=242&amp;scr_x=0&amp;scr_y=2547&amp;eid=44759926%2C44759837%2C44759875%2C31078143%2C31078201%2C31078258%2C44804180%2C31067146%2C31067147%2C31067148%2C31068556&amp;oid=2&amp;pvsid=1408631772858733&amp;tmod=2106568913&amp;uas=0&amp;nvt=2&amp;fsapi=1&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1496%2C0%2C1496%2C242%2C1496%2C242&amp;vis=1&amp;rsz=%7C%7Cs%7C&amp;abl=NS&amp;fu=32768&amp;bc=31&amp;td=1&amp;nt=1&amp;ifi=1&amp;uci=a!1&amp;fsb=1&amp;dtd=401"
                data-google-container-id="a!1" data-load-complete="true"></iframe></div>
    </ins>
    <script src="/back/src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="/back/src/plugins/datatables/js/buttons.flash.min.js"></script>

    <script src="/back/src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="/back/src/plugins/datatables/js/vfs_fonts.js"></script>

    <script src="/back/src/plugins/switchery/switchery.min.js"></script>
    <script src="/back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="/back/vendors/scripts/advanced-components.js"></script>

    <script src="/back/src/plugins/select2/dist/js/select2.min.js"></script>

    {{-- Linh --}}

    {{-- <script src="//code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

{{--  --}}
<script type="text/javascript">
    $(document).ready(function (){
        chart30daysorder();
        var chart = new Morris.Bar({
            element: 'chart',
            lineColor: ['#819C79', '#FC8710','#FF6541','#A4ADD3','#766B56'],
            parseTime: false,
            hideHover:"auto",
            xkey: 'period',
            ykeys: ['order','sales','profit','quantity'],
            labels: ['đơn hàng','doanh số','lợi nhuận','số lượng']
        });

        function chart30daysorder(){
            var _token = $('input[name="_token"]').val();
            //alert('hi');
            //alert(_token);
            $.ajax({
                url:"{{url('/admin/days-order')}}",
                method: "POST",
                dataType:"JSON",
                data:{_token:_token},

                success:function (data) {
                    //console.log(data);
                    chart.setData(data);
                }
            });
        };

        $('.dashboard-filter').change(function () {
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{url('/admin/dashboard-filter')}}",
                method: "POST",
                dataType: "JSON",
                data: { dashboard_value: dashboard_value, _token: _token },

                success: function (data) {
                    chart.setData(data);
                }
            });
        });

        $('#btn-dashboard-filter').click(function () {
            var _token = $('input[name="_token"]').val();
            // var from_date = $('#datepicker').val();
            // var to_date = $('#datepicker2').val();
            // Chuyển đổi ngày tháng từ MM/DD/YYYY sang YYYY-MM-DD
            var from_date = moment($('#datepicker').val(), 'MM/DD/YYYY').format('YYYY-MM-DD');
            var to_date = moment($('#datepicker2').val(), 'MM/DD/YYYY').format('YYYY-MM-DD');
            //alert(from_date);

            $.ajax({
                url: "{{url('/admin/filter-by-date')}}",
                method: "POST",
                dataType: "JSON",
                data: { from_date: from_date, to_date: to_date, _token: _token },

                success: function (data) {
                    chart.setData(data);
                }
            });
        });

    });
</script>

<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dataFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration: "slow"
        });
        $("#datepicker2").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dataFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration: "slow"
        });
    });
</script>
    {{-- Linh --}}

    @yield('script')
    @livewireScripts
    @stack('scripts')
</body>

</html>
