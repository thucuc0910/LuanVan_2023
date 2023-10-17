@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'DashBoard')
@section('style')
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@endsection
@section('content')
    <div class="title pb-20">
        <h2 class="h3 mb-0">Hospital Overview</h2>
    </div>

    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $productCount }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Đơn hàng mới
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                            <i class="icon-copy dw dw-shopping-cart1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">$50,000</div>
                        <div class="font-14 text-secondary weight-500">Doanh thu</div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);">
                            <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $userCount }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Người dùng mới
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
                            <span class="icon-copy ti-user"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">400+</div>
                        <div class="font-14 text-secondary weight-500">
                            Lượt truy cập cửa hàng
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon">
                            <i class="icon-copy dw dw-cursor"></i>
                            {{-- <i class="icon-copy fa fa-cursor" aria-hidden="true"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- Chart --}}
    {{-- <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card-box height-100-p pd-20" style="position: relative;">
                <h2 class="h4 mb-20">Activity</h2>
                <div id="chart5" style="min-height: 350px;">
                    <div id="apexcharts75921d" class="apexcharts-canvas apexcharts75921d apexcharts-theme-light"
                        style="width: 707px; height: 350px;"><svg id="SvgjsSvg1383" width="707" height="350"
                            xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                            transform="translate(0, 0)" style="background: transparent;">
                            <foreignObject x="0" y="0" width="707" height="350">
                                <div class="apexcharts-legend apexcharts-align-right position-top"
                                    xmlns="http://www.w3.org/1999/xhtml"
                                    style="right: 0px; position: absolute; left: 0px; top: 0px;">
                                    <div class="apexcharts-legend-series" rel="1" data:collapsed="false"
                                        style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="1"
                                            data:collapsed="false"
                                            style="background: rgb(27, 0, 255); color: rgb(27, 0, 255); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 15px;"></span><span
                                            class="apexcharts-legend-text" rel="1" i="0"
                                            data:default-text="In%20Progress" data:collapsed="false"
                                            style="color: rgb(53, 53, 53); font-size: 16px; font-weight: 400; font-family: Poppins, sans-serif;">In
                                            Progress</span></div>
                                    <div class="apexcharts-legend-series" rel="2" data:collapsed="false"
                                        style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="2"
                                            data:collapsed="false"
                                            style="background: rgb(245, 103, 103); color: rgb(245, 103, 103); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 15px;"></span><span
                                            class="apexcharts-legend-text" rel="2" i="1" data:default-text="Complete"
                                            data:collapsed="false"
                                            style="color: rgb(53, 53, 53); font-size: 16px; font-weight: 400; font-family: Poppins, sans-serif;">Complete</span>
                                    </div>
                                </div>
                                <style type="text/css">
                                    .apexcharts-legend {
                                        display: flex;
                                        overflow: auto;
                                        padding: 0 10px;
                                    }

                                    .apexcharts-legend.position-bottom,
                                    .apexcharts-legend.position-top {
                                        flex-wrap: wrap
                                    }

                                    .apexcharts-legend.position-right,
                                    .apexcharts-legend.position-left {
                                        flex-direction: column;
                                        bottom: 0;
                                    }

                                    .apexcharts-legend.position-bottom.apexcharts-align-left,
                                    .apexcharts-legend.position-top.apexcharts-align-left,
                                    .apexcharts-legend.position-right,
                                    .apexcharts-legend.position-left {
                                        justify-content: flex-start;
                                    }

                                    .apexcharts-legend.position-bottom.apexcharts-align-center,
                                    .apexcharts-legend.position-top.apexcharts-align-center {
                                        justify-content: center;
                                    }

                                    .apexcharts-legend.position-bottom.apexcharts-align-right,
                                    .apexcharts-legend.position-top.apexcharts-align-right {
                                        justify-content: flex-end;
                                    }

                                    .apexcharts-legend-series {
                                        cursor: pointer;
                                        line-height: normal;
                                    }

                                    .apexcharts-legend.position-bottom .apexcharts-legend-series,
                                    .apexcharts-legend.position-top .apexcharts-legend-series {
                                        display: flex;
                                        align-items: center;
                                    }

                                    .apexcharts-legend-text {
                                        position: relative;
                                        font-size: 14px;
                                    }

                                    .apexcharts-legend-text *,
                                    .apexcharts-legend-marker * {
                                        pointer-events: none;
                                    }

                                    .apexcharts-legend-marker {
                                        position: relative;
                                        display: inline-block;
                                        cursor: pointer;
                                        margin-right: 3px;
                                        border-style: solid;
                                    }

                                    .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                    .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                        display: inline-block;
                                    }

                                    .apexcharts-legend-series.apexcharts-no-click {
                                        cursor: auto;
                                    }

                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                        display: none !important;
                                    }

                                    .apexcharts-inactive-legend {
                                        opacity: 0.45;
                                    }
                                </style>
                            </foreignObject>
                            <g id="SvgjsG1385" class="apexcharts-inner apexcharts-graphical"
                                transform="translate(46.73750114440918, 49.20000076293945)">
                                <defs id="SvgjsDefs1384">
                                    <linearGradient id="SvgjsLinearGradient1389" x1="0" y1="0"
                                        x2="0" y2="1">
                                        <stop id="SvgjsStop1390" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)"
                                            offset="0"></stop>
                                        <stop id="SvgjsStop1391" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)"
                                            offset="1"></stop>
                                        <stop id="SvgjsStop1392" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)"
                                            offset="1"></stop>
                                    </linearGradient>
                                    <clipPath id="gridRectMask75921d">
                                        <rect id="SvgjsRect1394" width="656.2624988555908" height="256.7343980026245"
                                            x="-3" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </clipPath>
                                    <clipPath id="gridRectMarkerMask75921d">
                                        <rect id="SvgjsRect1395" width="652.2624988555908" height="256.7343980026245"
                                            x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </clipPath>
                                </defs>
                                <rect id="SvgjsRect1393" width="13.547135392824806" height="254.73439800262452" x="0"
                                    y="0" rx="0" ry="0" fill="url(#SvgjsLinearGradient1389)"
                                    opacity="1" stroke-width="0" stroke-dasharray="3" class="apexcharts-xcrosshairs"
                                    y2="254.73439800262452" filter="none" fill-opacity="0.9"></rect>
                                <g id="SvgjsG1414" class="apexcharts-xaxis" transform="translate(0, 0)">
                                    <g id="SvgjsG1415" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                        <text id="SvgjsText1417" font-family="Poppins, sans-serif" x="54.18854157129923"
                                            y="283.7343980026245" text-anchor="middle" dominant-baseline="auto"
                                            font-size="16px" font-weight="400" fill="#353535"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Poppins, sans-serif;">
                                            <tspan id="SvgjsTspan1418">Jan</tspan>
                                            <title>Jan</title>
                                        </text><text id="SvgjsText1420" font-family="Poppins, sans-serif"
                                            x="162.5656247138977" y="283.7343980026245" text-anchor="middle"
                                            dominant-baseline="auto" font-size="16px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Poppins, sans-serif;">
                                            <tspan id="SvgjsTspan1421">Feb</tspan>
                                            <title>Feb</title>
                                        </text><text id="SvgjsText1423" font-family="Poppins, sans-serif"
                                            x="270.94270785649616" y="283.7343980026245" text-anchor="middle"
                                            dominant-baseline="auto" font-size="16px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Poppins, sans-serif;">
                                            <tspan id="SvgjsTspan1424">Mar</tspan>
                                            <title>Mar</title>
                                        </text><text id="SvgjsText1426" font-family="Poppins, sans-serif"
                                            x="379.3197909990946" y="283.7343980026245" text-anchor="middle"
                                            dominant-baseline="auto" font-size="16px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Poppins, sans-serif;">
                                            <tspan id="SvgjsTspan1427">Apr</tspan>
                                            <title>Apr</title>
                                        </text><text id="SvgjsText1429" font-family="Poppins, sans-serif"
                                            x="487.69687414169306" y="283.7343980026245" text-anchor="middle"
                                            dominant-baseline="auto" font-size="16px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Poppins, sans-serif;">
                                            <tspan id="SvgjsTspan1430">May</tspan>
                                            <title>May</title>
                                        </text><text id="SvgjsText1432" font-family="Poppins, sans-serif"
                                            x="596.0739572842916" y="283.7343980026245" text-anchor="middle"
                                            dominant-baseline="auto" font-size="16px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-xaxis-label "
                                            style="font-family: Poppins, sans-serif;">
                                            <tspan id="SvgjsTspan1433">Jun</tspan>
                                            <title>Jun</title>
                                        </text></g>
                                    <line id="SvgjsLine1434" x1="0" y1="255.73439800262452"
                                        x2="650.2624988555908" y2="255.73439800262452" stroke="#8fa6bc"
                                        stroke-dasharray="0" stroke-width="1"></line>
                                </g>
                                <g id="SvgjsG1451" class="apexcharts-grid">
                                    <g id="SvgjsG1452" class="apexcharts-gridlines-horizontal">
                                        <line id="SvgjsLine1461" x1="0" y1="0" x2="650.2624988555908"
                                            y2="0" stroke="#c7d2dd" stroke-dasharray="5"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1462" x1="0" y1="50.9468796005249"
                                            x2="650.2624988555908" y2="50.9468796005249" stroke="#c7d2dd"
                                            stroke-dasharray="5" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1463" x1="0" y1="101.8937592010498"
                                            x2="650.2624988555908" y2="101.8937592010498" stroke="#c7d2dd"
                                            stroke-dasharray="5" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1464" x1="0" y1="152.8406388015747"
                                            x2="650.2624988555908" y2="152.8406388015747" stroke="#c7d2dd"
                                            stroke-dasharray="5" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1465" x1="0" y1="203.7875184020996"
                                            x2="650.2624988555908" y2="203.7875184020996" stroke="#c7d2dd"
                                            stroke-dasharray="5" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1466" x1="0" y1="254.73439800262452"
                                            x2="650.2624988555908" y2="254.73439800262452" stroke="#c7d2dd"
                                            stroke-dasharray="5" class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG1453" class="apexcharts-gridlines-vertical"></g>
                                    <line id="SvgjsLine1454" x1="0" y1="255.73439800262452" x2="0"
                                        y2="261.7343980026245" stroke="#e0e0e0" stroke-dasharray="0"
                                        class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1455" x1="108.37708314259847" y1="255.73439800262452"
                                        x2="108.37708314259847" y2="261.7343980026245" stroke="#e0e0e0"
                                        stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1456" x1="216.75416628519693" y1="255.73439800262452"
                                        x2="216.75416628519693" y2="261.7343980026245" stroke="#e0e0e0"
                                        stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1457" x1="325.1312494277954" y1="255.73439800262452"
                                        x2="325.1312494277954" y2="261.7343980026245" stroke="#e0e0e0"
                                        stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1458" x1="433.50833257039386" y1="255.73439800262452"
                                        x2="433.50833257039386" y2="261.7343980026245" stroke="#e0e0e0"
                                        stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1459" x1="541.8854157129923" y1="255.73439800262452"
                                        x2="541.8854157129923" y2="261.7343980026245" stroke="#e0e0e0"
                                        stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1460" x1="650.2624988555908" y1="255.73439800262452"
                                        x2="650.2624988555908" y2="261.7343980026245" stroke="#e0e0e0"
                                        stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1468" x1="0" y1="254.73439800262452"
                                        x2="650.2624988555908" y2="254.73439800262452" stroke="transparent"
                                        stroke-dasharray="0"></line>
                                    <line id="SvgjsLine1467" x1="0" y1="1" x2="0"
                                        y2="254.73439800262452" stroke="transparent" stroke-dasharray="0"></line>
                                </g>
                                <g id="SvgjsG1397" class="apexcharts-bar-series apexcharts-plot-series">
                                    <g id="SvgjsG1398" class="apexcharts-series" rel="1" seriesName="InxProgress"
                                        data:realIndex="0">
                                        <path id="SvgjsPath1400"
                                            d="M 40.641406178474426 254.73439800262452L 40.641406178474426 53.33366344873111Q 46.414973874886826 48.5600957523187 52.18854157129923 53.33366344873111L 52.18854157129923 254.73439800262452L 39.641406178474426 254.73439800262452"
                                            fill="rgba(27,0,255,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 40.641406178474426 254.73439800262452L 40.641406178474426 53.33366344873111Q 46.414973874886826 48.5600957523187 52.18854157129923 53.33366344873111L 52.18854157129923 254.73439800262452L 39.641406178474426 254.73439800262452"
                                            pathFrom="M 40.641406178474426 254.73439800262452L 40.641406178474426 254.73439800262452L 52.18854157129923 254.73439800262452L 52.18854157129923 254.73439800262452L 39.641406178474426 254.73439800262452"
                                            cy="50.94687960052491" cx="148.01848932107288" j="0" val="40"
                                            barHeight="203.7875184020996" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1401"
                                            d="M 149.01848932107288 254.73439800262452L 149.01848932107288 114.46991896936099Q 154.7920570174853 109.69635127294859 160.56562471389768 114.46991896936099L 160.56562471389768 254.73439800262452L 148.01848932107288 254.73439800262452"
                                            fill="rgba(27,0,255,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 149.01848932107288 254.73439800262452L 149.01848932107288 114.46991896936099Q 154.7920570174853 109.69635127294859 160.56562471389768 114.46991896936099L 160.56562471389768 254.73439800262452L 148.01848932107288 254.73439800262452"
                                            pathFrom="M 149.01848932107288 254.73439800262452L 149.01848932107288 254.73439800262452L 160.56562471389768 254.73439800262452L 160.56562471389768 254.73439800262452L 148.01848932107288 254.73439800262452"
                                            cy="112.08313512115478" cx="256.39557246367133" j="1" val="28"
                                            barHeight="142.65126288146973" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1402"
                                            d="M 257.39557246367133 254.73439800262452L 257.39557246367133 17.670847728363675Q 263.1691401600837 12.897280031951272 268.94270785649616 17.670847728363675L 268.94270785649616 254.73439800262452L 256.39557246367133 254.73439800262452"
                                            fill="rgba(27,0,255,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 257.39557246367133 254.73439800262452L 257.39557246367133 17.670847728363675Q 263.1691401600837 12.897280031951272 268.94270785649616 17.670847728363675L 268.94270785649616 254.73439800262452L 256.39557246367133 254.73439800262452"
                                            pathFrom="M 257.39557246367133 254.73439800262452L 257.39557246367133 254.73439800262452L 268.94270785649616 254.73439800262452L 268.94270785649616 254.73439800262452L 256.39557246367133 254.73439800262452"
                                            cy="15.284063880157476" cx="364.7726556062698" j="2" val="47"
                                            barHeight="239.45033412246704" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1403"
                                            d="M 365.7726556062698 254.73439800262452L 365.7726556062698 145.03804672967593Q 371.54622330268217 140.2644790332635 377.3197909990946 145.03804672967593L 377.3197909990946 254.73439800262452L 364.7726556062698 254.73439800262452"
                                            fill="rgba(27,0,255,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 365.7726556062698 254.73439800262452L 365.7726556062698 145.03804672967593Q 371.54622330268217 140.2644790332635 377.3197909990946 145.03804672967593L 377.3197909990946 254.73439800262452L 364.7726556062698 254.73439800262452"
                                            pathFrom="M 365.7726556062698 254.73439800262452L 365.7726556062698 254.73439800262452L 377.3197909990946 254.73439800262452L 377.3197909990946 254.73439800262452L 364.7726556062698 254.73439800262452"
                                            cy="142.65126288146973" cx="473.14973874886823" j="3" val="22"
                                            barHeight="112.08313512115478" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1404"
                                            d="M 474.14973874886823 254.73439800262452L 474.14973874886823 83.90179120904607Q 479.9233064452806 79.12822351263367 485.69687414169306 83.90179120904607L 485.69687414169306 254.73439800262452L 473.14973874886823 254.73439800262452"
                                            fill="rgba(27,0,255,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 474.14973874886823 254.73439800262452L 474.14973874886823 83.90179120904607Q 479.9233064452806 79.12822351263367 485.69687414169306 83.90179120904607L 485.69687414169306 254.73439800262452L 473.14973874886823 254.73439800262452"
                                            pathFrom="M 474.14973874886823 254.73439800262452L 474.14973874886823 254.73439800262452L 485.69687414169306 254.73439800262452L 485.69687414169306 254.73439800262452L 473.14973874886823 254.73439800262452"
                                            cy="81.51500736083986" cx="581.5268218914667" j="4" val="34"
                                            barHeight="173.21939064178466" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1405"
                                            d="M 582.5268218914667 254.73439800262452L 582.5268218914667 129.75398284951845Q 588.3003895878792 124.98041515310605 594.0739572842915 129.75398284951845L 594.0739572842915 254.73439800262452L 581.5268218914667 254.73439800262452"
                                            fill="rgba(27,0,255,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 582.5268218914667 254.73439800262452L 582.5268218914667 129.75398284951845Q 588.3003895878792 124.98041515310605 594.0739572842915 129.75398284951845L 594.0739572842915 254.73439800262452L 581.5268218914667 254.73439800262452"
                                            pathFrom="M 582.5268218914667 254.73439800262452L 582.5268218914667 254.73439800262452L 594.0739572842915 254.73439800262452L 594.0739572842915 254.73439800262452L 581.5268218914667 254.73439800262452"
                                            cy="127.36719900131226" cx="689.9039050340652" j="5" val="25"
                                            barHeight="127.36719900131226" barWidth="13.547135392824806"></path>
                                    </g>
                                    <g id="SvgjsG1406" class="apexcharts-series" rel="2" seriesName="Complete"
                                        data:realIndex="1">
                                        <path id="SvgjsPath1408"
                                            d="M 54.18854157129923 254.73439800262452L 54.18854157129923 104.28054304925602Q 59.96210926771164 99.50697535284363 65.73567696412404 104.28054304925602L 65.73567696412404 254.73439800262452L 53.18854157129923 254.73439800262452"
                                            fill="rgba(245,103,103,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 54.18854157129923 254.73439800262452L 54.18854157129923 104.28054304925602Q 59.96210926771164 99.50697535284363 65.73567696412404 104.28054304925602L 65.73567696412404 254.73439800262452L 53.18854157129923 254.73439800262452"
                                            pathFrom="M 54.18854157129923 254.73439800262452L 54.18854157129923 254.73439800262452L 65.73567696412404 254.73439800262452L 65.73567696412404 254.73439800262452L 53.18854157129923 254.73439800262452"
                                            cy="101.89375920104982" cx="161.56562471389768" j="0" val="30"
                                            barHeight="152.8406388015747" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1409"
                                            d="M 162.56562471389768 254.73439800262452L 162.56562471389768 155.2274226497809Q 168.3391924103101 150.45385495336848 174.11276010672248 155.2274226497809L 174.11276010672248 254.73439800262452L 161.56562471389768 254.73439800262452"
                                            fill="rgba(245,103,103,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 162.56562471389768 254.73439800262452L 162.56562471389768 155.2274226497809Q 168.3391924103101 150.45385495336848 174.11276010672248 155.2274226497809L 174.11276010672248 254.73439800262452L 161.56562471389768 254.73439800262452"
                                            pathFrom="M 162.56562471389768 254.73439800262452L 162.56562471389768 254.73439800262452L 174.11276010672248 254.73439800262452L 174.11276010672248 254.73439800262452L 161.56562471389768 254.73439800262452"
                                            cy="152.8406388015747" cx="269.94270785649616" j="1" val="20"
                                            barHeight="101.8937592010498" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1410"
                                            d="M 270.94270785649616 254.73439800262452L 270.94270785649616 68.61772732888859Q 276.71627555290854 63.84415963247619 282.489843249321 68.61772732888859L 282.489843249321 254.73439800262452L 269.94270785649616 254.73439800262452"
                                            fill="rgba(245,103,103,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 270.94270785649616 254.73439800262452L 270.94270785649616 68.61772732888859Q 276.71627555290854 63.84415963247619 282.489843249321 68.61772732888859L 282.489843249321 254.73439800262452L 269.94270785649616 254.73439800262452"
                                            pathFrom="M 270.94270785649616 254.73439800262452L 270.94270785649616 254.73439800262452L 282.489843249321 254.73439800262452L 282.489843249321 254.73439800262452L 269.94270785649616 254.73439800262452"
                                            cy="66.23094348068238" cx="378.3197909990946" j="2" val="37"
                                            barHeight="188.50345452194213" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1411"
                                            d="M 379.3197909990946 254.73439800262452L 379.3197909990946 206.1743022503058Q 385.093358695507 201.4007345538934 390.86692639191943 206.1743022503058L 390.86692639191943 254.73439800262452L 378.3197909990946 254.73439800262452"
                                            fill="rgba(245,103,103,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 379.3197909990946 254.73439800262452L 379.3197909990946 206.1743022503058Q 385.093358695507 201.4007345538934 390.86692639191943 206.1743022503058L 390.86692639191943 254.73439800262452L 378.3197909990946 254.73439800262452"
                                            pathFrom="M 379.3197909990946 254.73439800262452L 379.3197909990946 254.73439800262452L 390.86692639191943 254.73439800262452L 390.86692639191943 254.73439800262452L 378.3197909990946 254.73439800262452"
                                            cy="203.7875184020996" cx="486.69687414169306" j="3" val="10"
                                            barHeight="50.9468796005249" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1412"
                                            d="M 487.69687414169306 254.73439800262452L 487.69687414169306 114.46991896936099Q 493.47044183810544 109.69635127294859 499.2440095345179 114.46991896936099L 499.2440095345179 254.73439800262452L 486.69687414169306 254.73439800262452"
                                            fill="rgba(245,103,103,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 487.69687414169306 254.73439800262452L 487.69687414169306 114.46991896936099Q 493.47044183810544 109.69635127294859 499.2440095345179 114.46991896936099L 499.2440095345179 254.73439800262452L 486.69687414169306 254.73439800262452"
                                            pathFrom="M 487.69687414169306 254.73439800262452L 487.69687414169306 254.73439800262452L 499.2440095345179 254.73439800262452L 499.2440095345179 254.73439800262452L 486.69687414169306 254.73439800262452"
                                            cy="112.08313512115478" cx="595.0739572842915" j="4" val="28"
                                            barHeight="142.65126288146973" barWidth="13.547135392824806"></path>
                                        <path id="SvgjsPath1413"
                                            d="M 596.0739572842915 254.73439800262452L 596.0739572842915 201.07961429025332Q 601.847524980704 196.3060465938409 607.6210926771163 201.07961429025332L 607.6210926771163 254.73439800262452L 595.0739572842915 254.73439800262452"
                                            fill="rgba(245,103,103,1)" fill-opacity="1" stroke="transparent"
                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                            clip-path="url(#gridRectMask75921d)"
                                            pathTo="M 596.0739572842915 254.73439800262452L 596.0739572842915 201.07961429025332Q 601.847524980704 196.3060465938409 607.6210926771163 201.07961429025332L 607.6210926771163 254.73439800262452L 595.0739572842915 254.73439800262452"
                                            pathFrom="M 596.0739572842915 254.73439800262452L 596.0739572842915 254.73439800262452L 607.6210926771163 254.73439800262452L 607.6210926771163 254.73439800262452L 595.0739572842915 254.73439800262452"
                                            cy="198.69283044204712" cx="703.45104042689" j="5" val="11"
                                            barHeight="56.04156756057739" barWidth="13.547135392824806"></path>
                                    </g>
                                    <g id="SvgjsG1399" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    <g id="SvgjsG1407" class="apexcharts-datalabels" data:realIndex="1"></g>
                                </g>
                                <line id="SvgjsLine1469" x1="0" y1="0" x2="650.2624988555908"
                                    y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                    class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine1470" x1="0" y1="0" x2="650.2624988555908"
                                    y2="0" stroke-dasharray="0" stroke-width="0"
                                    class="apexcharts-ycrosshairs-hidden"></line>
                                <g id="SvgjsG1471" class="apexcharts-yaxis-annotations"></g>
                                <g id="SvgjsG1472" class="apexcharts-xaxis-annotations"></g>
                                <g id="SvgjsG1473" class="apexcharts-point-annotations"></g>
                            </g>
                            <g id="SvgjsG1435" class="apexcharts-yaxis" rel="0"
                                transform="translate(16.73750114440918, 0)">
                                <g id="SvgjsG1436" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1437"
                                        font-family="Poppins, sans-serif" x="20" y="50.70000076293945" text-anchor="end"
                                        dominant-baseline="auto" font-size="16px" font-weight="regular" fill="#353535"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Poppins, sans-serif;">
                                        <tspan id="SvgjsTspan1438">50</tspan>
                                    </text><text id="SvgjsText1439" font-family="Poppins, sans-serif" x="20"
                                        y="101.64688036346436" text-anchor="end" dominant-baseline="auto"
                                        font-size="16px" font-weight="regular" fill="#353535"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Poppins, sans-serif;">
                                        <tspan id="SvgjsTspan1440">40</tspan>
                                    </text><text id="SvgjsText1441" font-family="Poppins, sans-serif" x="20"
                                        y="152.59375996398927" text-anchor="end" dominant-baseline="auto"
                                        font-size="16px" font-weight="regular" fill="#353535"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Poppins, sans-serif;">
                                        <tspan id="SvgjsTspan1442">30</tspan>
                                    </text><text id="SvgjsText1443" font-family="Poppins, sans-serif" x="20"
                                        y="203.54063956451418" text-anchor="end" dominant-baseline="auto"
                                        font-size="16px" font-weight="regular" fill="#353535"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Poppins, sans-serif;">
                                        <tspan id="SvgjsTspan1444">20</tspan>
                                    </text><text id="SvgjsText1445" font-family="Poppins, sans-serif" x="20"
                                        y="254.4875191650391" text-anchor="end" dominant-baseline="auto" font-size="16px"
                                        font-weight="regular" fill="#353535"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Poppins, sans-serif;">
                                        <tspan id="SvgjsTspan1446">10</tspan>
                                    </text><text id="SvgjsText1447" font-family="Poppins, sans-serif" x="20"
                                        y="305.43439876556397" text-anchor="end" dominant-baseline="auto"
                                        font-size="16px" font-weight="regular" fill="#353535"
                                        class="apexcharts-text apexcharts-yaxis-label "
                                        style="font-family: Poppins, sans-serif;">
                                        <tspan id="SvgjsTspan1448">0</tspan>
                                    </text></g>
                                <g id="SvgjsG1449" class="apexcharts-yaxis-title"><text id="SvgjsText1450"
                                        font-family="Poppins, sans-serif" x="-15.274999618530273" y="176.5671997642517"
                                        text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="900"
                                        fill="#373d3f" class="apexcharts-text apexcharts-yaxis-title-text "
                                        style="font-family: Poppins, sans-serif;" transform="rotate(-90 0 0)"></text></g>
                            </g>
                        </svg>
                        <div class="apexcharts-tooltip apexcharts-theme-light">
                            <div class="apexcharts-tooltip-title"
                                style="font-family: Poppins, sans-serif; font-size: 15px;"></div>
                            <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                    style="background-color: rgb(27, 0, 255);"></span>
                                <div class="apexcharts-tooltip-text"
                                    style="font-family: Poppins, sans-serif; font-size: 15px;">
                                    <div class="apexcharts-tooltip-y-group"><span
                                            class="apexcharts-tooltip-text-label"></span><span
                                            class="apexcharts-tooltip-text-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span
                                            class="apexcharts-tooltip-text-z-label"></span><span
                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                </div>
                            </div>
                            <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                    style="background-color: rgb(245, 103, 103);"></span>
                                <div class="apexcharts-tooltip-text"
                                    style="font-family: Poppins, sans-serif; font-size: 15px;">
                                    <div class="apexcharts-tooltip-y-group"><span
                                            class="apexcharts-tooltip-text-label"></span><span
                                            class="apexcharts-tooltip-text-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span
                                            class="apexcharts-tooltip-text-z-label"></span><span
                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resize-triggers">
                    <div class="expand-trigger">
                        <div style="width: 748px; height: 438px;"></div>
                    </div>
                    <div class="contract-trigger"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p pd-20" style="position: relative;">
                <h2 class="h4 mb-20">Lead Target</h2>
                <div id="chart6" style="min-height: 311.775px;">
                    <div id="apexcharts759246" class="apexcharts-canvas apexcharts759246 apexcharts-theme-light"
                        style="width: 319px; height: 311.775px;"><svg id="SvgjsSvg1474" width="319" height="311.775"
                            xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                            transform="translate(0, 0)" style="background: transparent;">
                            <g id="SvgjsG1476" class="apexcharts-inner apexcharts-graphical"
                                transform="translate(-2.5, 0)">
                                <defs id="SvgjsDefs1475">
                                    <clipPath id="gridRectMask759246">
                                        <rect id="SvgjsRect1477" width="332" height="350" x="-3" y="-1"
                                            rx="0" ry="0" fill="#ffffff" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </clipPath>
                                    <clipPath id="gridRectMarkerMask759246">
                                        <rect id="SvgjsRect1478" width="328" height="350" x="-1" y="-1"
                                            rx="0" ry="0" fill="#ffffff" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </clipPath>
                                    <linearGradient id="SvgjsLinearGradient1484" x1="1" y1="0"
                                        x2="0" y2="1">
                                        <stop id="SvgjsStop1485" stop-opacity="1" stop-color="rgba(242,242,242,1)"
                                            offset="0"></stop>
                                        <stop id="SvgjsStop1486" stop-opacity="1" stop-color="rgba(242,242,242,1)"
                                            offset="0.5"></stop>
                                        <stop id="SvgjsStop1487" stop-opacity="1" stop-color="rgba(242,242,242,1)"
                                            offset="0.65"></stop>
                                        <stop id="SvgjsStop1488" stop-opacity="1" stop-color="rgba(242,242,242,1)"
                                            offset="0.91"></stop>
                                    </linearGradient>
                                    <linearGradient id="SvgjsLinearGradient1496" x1="1" y1="0"
                                        x2="0" y2="1">
                                        <stop id="SvgjsStop1497" stop-opacity="1" stop-color="rgba(11,19,43,1)"
                                            offset="0"></stop>
                                        <stop id="SvgjsStop1498" stop-opacity="1" stop-color="rgba(11,19,43,1)"
                                            offset="0.5"></stop>
                                        <stop id="SvgjsStop1499" stop-opacity="1" stop-color="rgba(11,19,43,1)"
                                            offset="0.65"></stop>
                                        <stop id="SvgjsStop1500" stop-opacity="1" stop-color="rgba(11,19,43,1)"
                                            offset="0.91"></stop>
                                    </linearGradient>
                                </defs>
                                <g id="SvgjsG1480" class="apexcharts-radialbar">
                                    <g id="SvgjsG1481">
                                        <g id="SvgjsG1482" class="apexcharts-tracks">
                                            <g id="SvgjsG1483" class="apexcharts-radialbar-track apexcharts-track"
                                                rel="1">
                                                <path id="apexcharts-radialbarTrack-0"
                                                    d="M 93.60436802928362 232.39563197071635 A 98.14024390243904 98.14024390243904 0 1 1 232.39563197071635 232.39563197071635"
                                                    fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)"
                                                    stroke-opacity="1" stroke-linecap="butt"
                                                    stroke-width="32.25841463414634" stroke-dasharray="0"
                                                    class="apexcharts-radialbar-area"
                                                    data:pathOrig="M 93.60436802928362 232.39563197071635 A 98.14024390243904 98.14024390243904 0 1 1 232.39563197071635 232.39563197071635">
                                                </path>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1490">
                                            <g id="SvgjsG1495" class="apexcharts-series apexcharts-radial-series"
                                                seriesName="AchievexGoals" rel="1" data:realIndex="0">
                                                <path id="SvgjsPath1501"
                                                    d="M 93.60436802928362 232.39563197071635 A 98.14024390243904 98.14024390243904 0 1 1 249.65269211624656 116.92594632293346"
                                                    fill="none" fill-opacity="0.85"
                                                    stroke="url(#SvgjsLinearGradient1496)" stroke-opacity="1"
                                                    stroke-linecap="butt" stroke-width="33.25609756097561"
                                                    stroke-dasharray="4"
                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                    data:angle="197" data:value="73" index="0" j="0"
                                                    data:pathOrig="M 93.60436802928362 232.39563197071635 A 98.14024390243904 98.14024390243904 0 1 1 249.65269211624656 116.92594632293346">
                                                </path>
                                            </g>
                                            <circle id="SvgjsCircle1491" r="77.01103658536587" cx="163"
                                                cy="163" class="apexcharts-radialbar-hollow" fill="transparent">
                                            </circle>
                                            <g id="SvgjsG1492" class="apexcharts-datalabels-group"
                                                transform="translate(0, 0) scale(1)" style="opacity: 1;"><text
                                                    id="SvgjsText1493" font-family="Helvetica, Arial, sans-serif" x="163"
                                                    y="283" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="16px" font-weight="400" fill="#0b132b"
                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                    style="font-family: Helvetica, Arial, sans-serif;">Achieve
                                                    Goals</text><text id="SvgjsText1494"
                                                    font-family="Helvetica, Arial, sans-serif" x="163" y="255"
                                                    text-anchor="middle" dominant-baseline="auto" font-size="22px"
                                                    font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                    style="font-family: Helvetica, Arial, sans-serif;">73%</text></g>
                                        </g>
                                    </g>
                                </g>
                                <line id="SvgjsLine1502" x1="0" y1="0" x2="326" y2="0"
                                    stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                    class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine1503" x1="0" y1="0" x2="326" y2="0"
                                    stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                            </g>
                        </svg>
                        <div class="apexcharts-legend"></div>
                    </div>
                </div>
                <div class="resize-triggers">
                    <div class="expand-trigger">
                        <div style="width: 360px; height: 438px;"></div>
                    </div>
                    <div class="contract-trigger"></div>
                </div>
            </div>
        </div>
    </div> --}}




    <div class="card-box mb-30">
        {{-- <div class="row pt-20 pr-20 pl-30"> --}}
        {{-- </div> --}}

        <div class="pl-20 pt-20">
            <form autocomplete="off" style="display: flex;">
                @csrf
                <div class="col-md-12 row">
                    <div class="col-md-4 row">
                        <div class="">
                            <p>
                                Lọc theo:
                            </p>
                        </div>
                        <div class="pl-2">
                            <select class="dashboard-filter">
                                <option>--Chọn--</option>
                                <option value="7ngay">7 ngày qua</option>
                                <option value="thangtruoc">Tháng trước</option>
                                <option value="thangnay">Tháng này
                                <option value="quy1">Quý 1</option>
                                <option value="quy2">Quý 2</option>
                                <option value="quy3">Quý 3</option>
                                <option value="quy4">Quý 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8 row">

                        <div class="col-md-4"></div>
                        <div class="pl-2">
                            <input type="text" id="datepicker" style="width: 150px">
                        </div>

                        <div class="pl-2">
                            <input type="text" id="datepicker2" style="width: 140px">
                        </div>

                        <div class="pl-2">
                            <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm"
                                value="Lọc kết quả">
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <hr>
        <div class="pb-20">
            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="pt-50">
                    <div class="col-12">
                        <div id="chart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Chart --}}

    <div class="card-box mb-30">
        <div class="row pt-20 pr-20">
            <div class="row col-md-12 col-sm-12">

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <div class="float-right">
                            @can('role-create')
                                <a class="btn btn-primary" href="{{ route('admin.products.create') }}"> Thêm sản
                                    phẩm</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr>



        <div class="pb-20">
            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="pt-50">
                    <table class=" table hover  data-table-export nowrap dataTable no-footer dtr-inline"
                        id="DataTables_Table_2" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1"
                                    colspan="1"aria-label="Name">
                                    No
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Age: activate to sort column ascending">
                                    Tên
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Office: activate to sort column ascending">
                                    Danh mục
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Address: activate to sort column ascending">
                                    Giá
                                </th>
                                {{-- <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Start Date: activate to sort column ascending"
                                        style="">
                                        Quantity
                                    </th> --}}
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Salart: activate to sort column ascending" style="">
                                    Tình trạng
                                </th>
                                <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Action">Tuỳ biến</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr role="row" class="odd">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @if ($product->category)
                                            {{ $product->category->name }}
                                        @else
                                            No category
                                        @endif
                                    </td>
                                    <td>{{ $product->original_price }}</td>
                                    <td>
                                        @if ($product->status == 1)
                                            <i class="btn micon bi bi-eye-fill"
                                                style="color: white; background-color: rgb(59, 89, 152);"></i>
                                        @else
                                            <i class="btn micon bi bi-eye-slash-fill"
                                                style="color: white; background-color: rgb(59, 89, 152);"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                                style="">
                                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i>
                                                    Edit</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
