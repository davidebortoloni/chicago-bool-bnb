<template>
    <div>
        <h1>Vue 3 TomTom Maps Demo</h1>
        <div id="map" ref="mapRef"></div>
    </div>
</template>

<script>
export default {
    name: "TomtomMap",
    methods: {
        addMarker(map) {
            const tt = window.tt;
            var location = [12.507088, 41.875983];
            var popupOffset = 25;

            var marker = new tt.Marker().setLngLat(location).addTo(map);
            var popup = new tt.Popup({ offset: popupOffset }).setHTML(
                 "Via Roma"
             );
            marker.setPopup(popup).togglePopup();
        },
            test() {
            const tt = window.tt;
            var map = tt.map({
                key: "DZpdDftAOlPmZZ5gbjHUVdd43CUnr2NZ",
                container: this.$refs.mapRef,
                center : [12.507088, 41.875983],
                zoom: 13,
            });
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());
            this.addMarker(map)
            return {
                mapRef,
            };
        },
    },
    mounted(){
    this.test()
 },
}
</script>

<style>
#map {
    height: 50vh;
    width: 50vw;
}
</style>
