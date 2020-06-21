
    <footer>
        <p>
            &copy; <?php echo date("Y"); ?> by Kismet Studio Biel/Bienne | Concept & Design: <a href="https://www.sifon.li">SIFON</a><br>
            Code: <a href="https://things.care" target="_blank">things.care</a>
        </p>
    </footer>

    <?php wp_footer(); ?> 
    
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidGhnaWV4IiwiYSI6ImNrYm9zeWd2NjI1bnAzNXF2dzI1bGZ5bnQifQ.fzySqcVkkJlGc8XPzP9QzA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/thgiex/ckbot0jff3nou1il8pqv66b6s',
            center: [
                7.24536,
                47.140075
            ],
            zoom: 14
        });
        map.addControl(new mapboxgl.NavigationControl());
        var marker = new mapboxgl.Marker()
            .setLngLat([
                7.24536,
                47.140075
            ])
            .addTo(map);

    </script>

</body>

</html>