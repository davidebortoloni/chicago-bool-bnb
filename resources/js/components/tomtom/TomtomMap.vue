<template>
    <div>
        <h1>Vue 3 TomTom Maps Demo</h1>
        <div id="map" ref="mapRef"></div>
    </div>
</template>

<script>
export default {
    name: "TomtomMap",
    props: ['lat', 'lon', 'street'],
    methods: {
        addMarker(map) {
            const tt = window.tt;
            var location = [this.lat, this.lon];
            var popupOffset = 25;

            var marker = new tt.Marker().setLngLat(location).addTo(map);
            var popup = new tt.Popup({ offset: popupOffset }).setHTML(
                 this.street
             );
            marker.setPopup(popup).togglePopup();
        },
            addMap() {
            const tt = window.tt;
            var map = tt.map({
                key: "DZpdDftAOlPmZZ5gbjHUVdd43CUnr2NZ",
                container: this.$refs.mapRef,
                center : [this.lat, this.lon],
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
    this.addMap()
 },
}
</script>

<style>
#map {
    height: 50vh;
    width: 40vw;
}
</style>
