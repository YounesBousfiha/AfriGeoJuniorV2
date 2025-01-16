<?php

$db = new DBConnection();
$admin = new AdminController($db);
// count of users, continents, countries and cities
$count_users = $admin->countUsers();
$count_continents = $admin->countContinents();
$count_countries = $admin->countCountries();
$count_cities = $admin->countCities();
?>

<div id="graphs" class="w-4/5 flex flex-col max-md:w-full">
    <div class="flex p-6">
        <p class="text-xl">Data Visualisation</p>
    </div>

    <div class="w-full h-full bg-white">

        <div class="bg-gray-100 p-2">
            <div class="grid grid-cols-4 gap-3">
                <dl class="bg-white rounded-lg flex flex-col items-center justify-center h-[100px]">
                    <dt class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 text-sm font-medium flex items-center justify-center mb-1">
                        <?= $count_users["count_users"] ?>
                    </dt>
                    <dd class="text-gray-600 text-sm font-medium">Users</dd>
                </dl>
                <dl class="bg-white rounded-lg flex flex-col items-center justify-center h-[100px]">
                    <dt class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 text-sm font-medium flex items-center justify-center mb-1">
                        <?= $count_continents["count_continents"] ?>
                    </dt>
                    <dd class="text-gray-600 text-sm font-medium">Continents</dd>
                </dl>
                <dl class="bg-white rounded-lg flex flex-col items-center justify-center h-[100px]">
                    <dt class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 text-sm font-medium flex items-center justify-center mb-1">
                        <?= $count_countries["count_countries"] ?>
                    </dt>
                    <dd class="text-gray-600 text-sm font-medium">Countries</dd>
                </dl>
                <dl class="bg-white rounded-lg flex flex-col items-center justify-center h-[100px]">
                    <dt class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 text-sm font-medium flex items-center justify-center mb-1">
                        <?= $count_cities["count_cities"] ?>
                    </dt>
                    <dd class="text-gray-600 text-sm font-medium">Cities</dd>
                </dl>
            </div>
        </div>

        <div class="flex-grow w-full flex flex-col gap-4 p-4">
            <div class="bg-gray-100 h-20">
                <strong></strong>
            </div>
            <div class="bg-gray-100 h-20"></div>
            <div class="bg-gray-100 h-20"></div>
            <div class="bg-gray-100 h-20"></div>
        </div>

        <!-- requettes sql avances  -->

        <!-- Line Chart -->
        <!-- <div class="py-6" id="pie-chart"></div> -->
    </div>
</div>

<script>
    const getChartOptions = () => {
        return {
            series: [33, 33, 33],
            colors: ["#22c55e", "#fca5a5", "#fef08a"],
            chart: {
                height: 320,
                width: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            labels: ["Reservation approved", "Reservations canceled", "Reservations pended"],
            dataLabels: {
                enabled: true,
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return value + "%"
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function(value) {
                        return value + "%"
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }

    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
        chart.render();
    }
</script>