<template>
    <div class="w-full h-full">
        <highcharts class="hc w-full" :options="chartOptions" ref="chart"></highcharts>
    </div>
</template>

<script>
import { defineComponent, ref } from "vue";
export default defineComponent({
    props: ["id"],
    data() {
        return {
            chartOptions: {
                chart: {
                    
                    zoomType: 'x',
                    type: "spline",
                    scrollablePlotArea: {
                        minWidth: 200,
                        scrollPositionX: 1,
                    },
                },
                xAxis: {
                    type: "datetime",
                    labels: {
                        overflow: "justify",
                    },
                },
                series: [
                    {
                        name: "Water Level",
                        data: [],
                    },
                ],
                title: {
                    text: "",
                },
                subtitle: {
                    text: "Water Level",
                },
                plotOptions: {
                    series: {
                        pointStart: Date.UTC(2010, 0, 1),
                        marker: {
                            enabled: false,
                            states: {
                                hover: {
                                    enabled: false
                                }
                            }
                        }
                    },
                },
            },
        };
    },
    async mounted() {
        let existingObj = this;
        await axios
            .get("/api/getSms")
            .then((response) => {
                console.log(response.data);
                // return;
                for (let i = 0; i < response.data.length; i++) {
                    existingObj.chartOptions.series[0].data[i] = [];
                    existingObj.chartOptions.series[0].data[i][0] = Date.UTC(
                        response.data[i].year,
                        response.data[i].month,
                        response.data[i].day,
                        response.data[i].hour,
                        response.data[i].min,
                        response.data[i].sec
                    );
                    existingObj.chartOptions.series[0].data[i][1] =
                        response.data[i].height;
                }
                existingObj.chartOptions.title.text = "Ilocos Norte";
            })
            .catch(function (error) {
                console.error(error);
            });
        if (this.id == 1) {
            existingObj.chartOptions.title.text = "Ilocos Norte";
        } else {
            existingObj.chartOptions.title.text = "Ilocos Sur";
        }
        console.log(this.id);
    },
});
</script>
